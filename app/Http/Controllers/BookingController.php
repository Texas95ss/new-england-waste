<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingConfirmedMail;
use App\Models\BinSize;
use App\Models\Booking;
use App\Models\Suburb;
use App\Models\WasteType;
use App\Services\BinPricingService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookingController extends Controller
{
    protected BinPricingService $pricingService;

    public function __construct(BinPricingService $pricingService)
    {
        $this->pricingService = $pricingService;
    }

    /**
     * Tampilkan halaman utama dengan wizard booking reaktif.
     */
    public function index(): View
    {
        $suburbs = Suburb::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $binSizes = BinSize::query()
            ->where('is_active', true)
            ->orderBy('capacity_m3')
            ->get();

        $wasteTypes = WasteType::query()->get();

        return view('booking.index', compact('suburbs', 'binSizes', 'wasteTypes'));
    }

    /**
     * Halaman panduan spesifikasi dan visualisasi ukuran skip bin (2m3 - 12m3).
     */
    public function guide(): View
    {
        $binSizes = BinSize::query()
            ->where('is_active', true)
            ->orderBy('capacity_m3')
            ->get();

        return view('pages.bin-guide', compact('binSizes'));
    }

    /**
     * Halaman area layanan, visualisasi peta rute regional, dan informasi depot New England.
     */
    public function serviceAreas(): View
    {
        $suburbs = Suburb::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('pages.service-areas', compact('suburbs'));
    }

    /**
     * Endpoint JSON untuk estimasi harga real-time (AJAX Live Estimate).
     */
    public function calculateAjax(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'suburb_id' => ['required', 'integer', 'exists:suburbs,id'],
            'bin_size_id' => ['required', 'integer', 'exists:bin_sizes,id'],
            'waste_type_id' => ['required', 'integer', 'exists:waste_types,id'],
            'delivery_date' => ['required', 'date'],
            'pickup_date' => ['required', 'date', 'after_or_equal:delivery_date'],
        ]);

        $suburb = Suburb::findOrFail($validated['suburb_id']);
        $binSize = BinSize::findOrFail($validated['bin_size_id']);
        $wasteType = WasteType::findOrFail($validated['waste_type_id']);

        // Menggunakan argumen posisional standar agar kompatibel di semua linter
        $pricing = $this->pricingService->calculate(
            $binSize,
            $wasteType,
            $suburb,
            $validated['delivery_date'],
            $validated['pickup_date']
        );

        return response()->json([
            'success' => true,
            'pricing' => $pricing->toArray(),
        ]);
    }

    /**
     * Simpan booking baru dengan atomic transaction.
     */
    public function store(StoreBookingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $suburb = Suburb::findOrFail($validated['suburb_id']);
        $binSize = BinSize::findOrFail($validated['bin_size_id']);
        $wasteType = WasteType::findOrFail($validated['waste_type_id']);

        // Hitung ulang harga di sisi server demi integritas finansial
        $pricing = $this->pricingService->calculate(
            $binSize,
            $wasteType,
            $suburb,
            $validated['delivery_date'],
            $validated['pickup_date']
        );

        $booking = DB::transaction(function () use ($validated, $pricing) {
            // Format Booking Ref Unik: NEW-YYYYMM-XXXX
            $datePrefix = Carbon::now()->format('Ym');
            $uniqueSuffix = strtoupper(bin2hex(random_bytes(2)));
            $bookingRef = "NEW-{$datePrefix}-{$uniqueSuffix}";

            while (Booking::where('booking_ref', $bookingRef)->exists()) {
                $uniqueSuffix = strtoupper(bin2hex(random_bytes(2)));
                $bookingRef = "NEW-{$datePrefix}-{$uniqueSuffix}";
            }

            return Booking::create([
                'booking_ref' => $bookingRef,
                'suburb_id' => (int) $validated['suburb_id'],
                'bin_size_id' => (int) $validated['bin_size_id'],
                'waste_type_id' => (int) $validated['waste_type_id'],
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'customer_email' => $validated['customer_email'],
                'delivery_address' => $validated['delivery_address'],
                'placement_location' => $validated['placement_location'],
                'delivery_date' => $validated['delivery_date'],
                'pickup_date' => $validated['pickup_date'],
                'total_days' => $pricing->totalDays,
                'base_amount' => $pricing->basePrice,
                'delivery_fee' => $pricing->deliveryFee,
                'extra_days_fee' => $pricing->extraDaysFee,
                'gst_amount' => $pricing->gstAmount,
                'total_amount' => $pricing->totalIncGst,
                'status' => 'confirmed',
            ]);
        });

        // Trigger email konfirmasi
        try {
            Mail::to($booking->customer_email)->send(new BookingConfirmedMail($booking));
        } catch (\Throwable $e) {
            Log::error('Failed to send booking confirmation email: ' . $e->getMessage(), [
                'booking_id' => $booking->id,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Your skip bin booking has been successfully confirmed!',
            'booking_ref' => $booking->booking_ref,
            'booking_id' => $booking->id,
            'redirect_url' => route('booking.success', ['ref' => $booking->booking_ref]),
        ]);
    }

    /**
     * Halaman konfirmasi sukses setelah booking berhasil.
     */
    public function success(string $ref): View
    {
        $booking = Booking::with(['suburb', 'binSize', 'wasteType'])
            ->where('booking_ref', $ref)
            ->firstOrFail();

        return view('booking.success', compact('booking'));
    }
}