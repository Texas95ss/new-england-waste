<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WasteType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surcharge',
        'allowed_materials',
        'banned_materials',
    ];

    protected function casts(): array
    {
        return [
            'surcharge' => 'decimal:2',
            'allowed_materials' => 'array',
            'banned_materials' => 'array',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getFormattedSurchargeAttribute(): string
    {
        return '$' . number_format((float) $this->surcharge, 2);
    }
}
