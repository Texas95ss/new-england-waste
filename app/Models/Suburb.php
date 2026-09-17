<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suburb extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postcode',
        'delivery_fee',
        'is_active',
    ];

    /**
     * Laravel 11 modern casting method
     */
    protected function casts(): array
    {
        return [
            'delivery_fee' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getFormattedDeliveryFeeAttribute(): string
    {
        return '$' . number_format((float) $this->delivery_fee, 2);
    }
}
