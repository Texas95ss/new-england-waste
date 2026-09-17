<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\PricingBreakdown;
use App\Models\BinSize;
use App\Models\Suburb;
use App\Models\WasteType;
use Carbon\Carbon;

class BinPricingService
{
    public const STANDARD_DAYS_INCLUDED = 7;
    public const DAILY_OVERDUE_RATE_AUD = 15.00;
    public const GST_RATE = 0.10; // 10% Australian GST

    public function calculate(
        BinSize $binSize,
        WasteType $wasteType,
        Suburb $suburb,
        string|Carbon $deliveryDate,
        string|Carbon $pickupDate
    ): PricingBreakdown {
        $start = $deliveryDate instanceof Carbon ? $deliveryDate->copy() : Carbon::parse($deliveryDate);
        $end = $pickupDate instanceof Carbon ? $pickupDate->copy() : Carbon::parse($pickupDate);

        // Inclusive rental duration (minimum 1 day)
        $diffDays = (int) $start->diffInDays($end);
        $totalDays = max(1, $diffDays);

        $extraDays = max(0, $totalDays - self::STANDARD_DAYS_INCLUDED);
        $extraDaysFee = round($extraDays * self::DAILY_OVERDUE_RATE_AUD, 2);

        $basePrice = (float) $binSize->base_price;
        $wasteSurcharge = (float) $wasteType->surcharge;
        $deliveryFee = (float) $suburb->delivery_fee;

        // Subtotal (Excluding Australian GST)
        $subtotalExGst = round($basePrice + $wasteSurcharge + $deliveryFee + $extraDaysFee, 2);

        // 10% GST Component
        $gstAmount = round($subtotalExGst * self::GST_RATE, 2);

        // Total Inclusive of GST
        $totalIncGst = round($subtotalExGst + $gstAmount, 2);

        return new PricingBreakdown(
            totalDays: $totalDays,
            extraDays: $extraDays,
            basePrice: $basePrice,
            wasteSurcharge: $wasteSurcharge,
            deliveryFee: $deliveryFee,
            extraDaysFee: $extraDaysFee,
            subtotalExGst: $subtotalExGst,
            gstAmount: $gstAmount,
            totalIncGst: $totalIncGst
        );
    }
}