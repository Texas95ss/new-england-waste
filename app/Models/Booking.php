<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_ref',
        'suburb_id',
        'bin_size_id',
        'waste_type_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'delivery_address',
        'placement_location',
        'delivery_date',
        'pickup_date',
        'total_days',
        'base_amount',
        'delivery_fee',
        'extra_days_fee',
        'gst_amount',
        'total_amount',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'delivery_date' => 'date',
            'pickup_date' => 'date',
            'total_days' => 'integer',
            'base_amount' => 'decimal:2',
            'delivery_fee' => 'decimal:2',
            'extra_days_fee' => 'decimal:2',
            'gst_amount' => 'decimal:2',
            'total_amount' => 'decimal:2',
        ];
    }

    public function suburb(): BelongsTo
    {
        return $this->belongsTo(Suburb::class);
    }

    public function binSize(): BelongsTo
    {
        return $this->belongsTo(BinSize::class);
    }

    public function wasteType(): BelongsTo
    {
        return $this->belongsTo(WasteType::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format((float) $this->total_amount, 2);
    }
}
