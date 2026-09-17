<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BinSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity_m3',
        'wheelie_bins_equiv',
        'dimensions',
        'base_price',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'capacity_m3' => 'decimal:1',
            'wheelie_bins_equiv' => 'integer',
            'base_price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getFormattedBasePriceAttribute(): string
    {
        return '$' . number_format((float) $this->base_price, 2);
    }
}
