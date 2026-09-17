<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#005D2A"/>
    <link rel="icon" type="image/webp" href="/images/logo.webp"/>
    <title>Booking Confirmed | {{ $booking->booking_ref }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
        @media print {
            body { background: white !important; padding: 0 !important; }
            .print-hidden { display: none !important; }
            .shadow-sm, .shadow-xs, .shadow-2xl, .shadow-md { box-shadow: none !important; }
            .border { border-color: #cbd5e1 !important; }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen py-10 px-4 sm:px-6">

    <div class="max-w-2xl mx-auto">
        <!-- Brand Logo -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-block group focus:outline-none" aria-label="New England Waste Home">
                <img 
                    src="/images/logo.webp" 
                    alt="New England Waste &amp; Recycling" 
                    class="h-12 sm:h-14 w-auto object-contain mx-auto transition-transform duration-200 group-hover:scale-105"
                    onerror="this.onerror=null; this.src='https://newenglandwaste.com.au/wp-content/uploads/2026/03/cropped-3264_Logo_Horizontal-scaled-1.webp';"
                />
            </a>
        </div>

        <!-- Success Badge -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xs">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </div>
            <span class="text-emerald-700 font-bold text-xs uppercase tracking-wider">Booking Confirmed</span>
            <h1 class="text-3xl font-extrabold text-slate-900 mt-1 font-heading">Thank You, {{ $booking->customer_name }}!</h1>
            <p class="text-slate-600 text-sm mt-2">
                A confirmation has been sent to <strong>{{ $booking->customer_email }}</strong>.
            </p>
        </div>

        <!-- Receipt Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-6">
            <div class="bg-emerald-950 text-white p-6 flex justify-between items-center">
                <div>
                    <span class="text-xs text-emerald-400 uppercase tracking-wider font-semibold block">Booking Reference</span>
                    <span class="text-2xl font-bold font-heading tracking-wide">{{ $booking->booking_ref }}</span>
                </div>
                <div class="text-right">
                    <span class="text-xs text-emerald-400 block">Status</span>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-emerald-800 text-emerald-200">CONFIRMED</span>
                </div>
            </div>

            <div class="p-6 space-y-6">
                <!-- Details Grid -->
                <div class="grid grid-cols-2 gap-4 text-sm border-b border-slate-100 pb-6">
                    <div>
                        <span class="text-xs text-slate-400 block">Bin Size:</span>
                        <span class="font-bold text-slate-800">{{ $booking->binSize->name }} ({{ $booking->binSize->capacity_m3 }}m³)</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 block">Waste Category:</span>
                        <span class="font-bold text-slate-800">{{ $booking->wasteType->name }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 block">Delivery Date:</span>
                        <span class="font-bold text-slate-800">{{ $booking->delivery_date->format('D, d M Y') }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 block">Pickup Date:</span>
                        <span class="font-bold text-slate-800">{{ $booking->pickup_date->format('D, d M Y') }} ({{ $booking->total_days }} days)</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-xs text-slate-400 block">Delivery Address:</span>
                        <span class="font-bold text-slate-800">{{ $booking->delivery_address }}, {{ $booking->suburb->name }} {{ $booking->suburb->postcode }}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-xs text-slate-400 block">Placement:</span>
                        <span class="font-semibold text-slate-800">{{ $booking->placement_location === 'driveway' ? 'Private Driveway (No permit needed)' : 'Nature Strip / Public Road Reserve' }}</span>
                    </div>
                </div>

                <!-- Financials -->
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between text-slate-600">
                        <span>Base Rate (7 Days):</span>
                        <span>${{ number_format((float) $booking->base_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Delivery ({{ $booking->suburb->name }}):</span>
                        <span>${{ number_format((float) $booking->delivery_fee, 2) }}</span>
                    </div>
                    @if((float) $booking->extra_days_fee > 0)
                    <div class="flex justify-between text-slate-600">
                        <span>Extra Days Fee:</span>
                        <span>${{ number_format((float) $booking->extra_days_fee, 2) }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-slate-500 text-xs">
                        <span>Australian GST (10%):</span>
                        <span>${{ number_format((float) $booking->gst_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold text-slate-900 border-t border-slate-200 pt-3">
                        <div>
                            <span class="block text-base sm:text-lg">Total Reserved / Amount Due:</span>
                            <span class="text-[11px] font-normal text-slate-500 block">Pay on delivery or invoiced directly by office</span>
                        </div>
                        <span class="text-[#005D2A] text-xl sm:text-2xl font-extrabold font-heading">${{ number_format((float) $booking->total_amount, 2) }} AUD</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Links (Hidden on Print) -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center print-hidden">
            <button onclick="window.print()" class="px-6 py-3.5 rounded-xl border border-slate-300 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-100 active:scale-95 transition-all flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                <span>Print Official Receipt</span>
            </button>
            <a href="{{ route('home') }}" class="px-6 py-3.5 rounded-xl bg-[#005D2A] hover:bg-[#00421D] active:scale-95 text-white text-sm font-bold shadow-md hover:shadow-lg transition-all text-center flex items-center justify-center gap-2 cursor-pointer">
                <span>Book Another Bin</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- Dispatch Help Note (Hidden on Print) -->
        <div class="mt-8 text-center text-xs text-slate-500 print-hidden">
            <span>Need to update delivery instructions or driveway access? Call dispatch directly on </span>
            <a href="tel:0429323696" class="text-[#005D2A] font-bold hover:underline whitespace-nowrap">0429 323 696</a>
        </div>
    </div>

</body>
</html>