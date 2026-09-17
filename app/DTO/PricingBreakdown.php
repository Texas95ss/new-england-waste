<?php

declare(strict_types=1);

namespace App\DTO;

readonly class PricingBreakdown
{
    public function __construct(
        public int $totalDays,
        public int $extraDays,
        public float $basePrice,
        public float $wasteSurcharge,
        public float $deliveryFee,
        public float $extraDaysFee,
        public float $subtotalExGst,
        public float $gstAmount,
        public float $totalIncGst,
    ) {}

    public function toArray(): array
    {
        return [
            'total_days' => $this->totalDays,
            'extra_days' => $this->extraDays,
            'base_price' => $this->basePrice,
            'base_price_formatted' => '$' . number_format($this->basePrice, 2),
            'waste_surcharge' => $this->wasteSurcharge,
            'waste_surcharge_formatted' => '$' . number_format($this->wasteSurcharge, 2),
            'delivery_fee' => $this->deliveryFee,
            'delivery_fee_formatted' => '$' . number_format($this->deliveryFee, 2),
            'extra_days_fee' => $this->extraDaysFee,
            'extra_days_fee_formatted' => '$' . number_format($this->extraDaysFee, 2),
            'subtotal_ex_gst' => $this->subtotalExGst,
            'subtotal_ex_gst_formatted' => '$' . number_format($this->subtotalExGst, 2),
            'gst_amount' => $this->gstAmount,
            'gst_amount_formatted' => '$' . number_format($this->gstAmount, 2),
            'total_inc_gst' => $this->totalIncGst,
            'total_inc_gst_formatted' => '$' . number_format($this->totalIncGst, 2),
        ];
    }
}