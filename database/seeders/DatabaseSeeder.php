<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\BinSize;
use App\Models\Suburb;
use App\Models\WasteType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Suburbs New England NSW
        $suburbs = [
            ['name' => 'Armidale', 'postcode' => '2350', 'delivery_fee' => 0.00],
            ['name' => 'Uralla', 'postcode' => '2358', 'delivery_fee' => 20.00],
            ['name' => 'Guyra', 'postcode' => '2365', 'delivery_fee' => 25.00],
            ['name' => 'Black Mountain', 'postcode' => '2365', 'delivery_fee' => 20.00],
            ['name' => 'Glen Innes', 'postcode' => '2370', 'delivery_fee' => 35.00],
            ['name' => 'Walcha', 'postcode' => '2354', 'delivery_fee' => 40.00],
            ['name' => 'Hillgrove', 'postcode' => '2350', 'delivery_fee' => 25.00],
            ['name' => 'Kentucky', 'postcode' => '2354', 'delivery_fee' => 30.00],
            ['name' => 'Deepwater', 'postcode' => '2371', 'delivery_fee' => 40.00],
            ['name' => 'Tenterfield', 'postcode' => '2372', 'delivery_fee' => 50.00],
            ['name' => 'Invergowrie', 'postcode' => '2350', 'delivery_fee' => 15.00],
            ['name' => 'Dangarsleigh', 'postcode' => '2350', 'delivery_fee' => 15.00],
        ];

        foreach ($suburbs as $suburb) {
            Suburb::updateOrCreate(
                ['name' => $suburb['name'], 'postcode' => $suburb['postcode']],
                ['delivery_fee' => $suburb['delivery_fee'], 'is_active' => true]
            );
        }

        // 2. Data Lengkap 7 Ukuran Bin (2, 3, 4, 6, 8, 10, 12 m³)
        $binSizes = [
            [
                'name' => '2m³ Mini Skip',
                'capacity_m3' => 2.0,
                'wheelie_bins_equiv' => 8,
                'dimensions' => '1.8m x 1.4m x 0.9m',
                'base_price' => 280.00,
                'description' => 'Ideal for seasonal garden cleanups, small garage purges, or domestic declutter.',
                'is_active' => true,
            ],
            [
                'name' => '3m³ Domestic Skip',
                'capacity_m3' => 3.0,
                'wheelie_bins_equiv' => 12,
                'dimensions' => '2.4m x 1.5m x 0.9m',
                'base_price' => 360.00,
                'description' => 'Great for bathroom or laundry renovations, old fencing, and minor landscaping.',
                'is_active' => true,
            ],
            [
                'name' => '4m³ Renovation Skip',
                'capacity_m3' => 4.0,
                'wheelie_bins_equiv' => 16,
                'dimensions' => '3.2m x 1.5m x 0.9m',
                'base_price' => 450.00,
                'description' => 'Regional favourite for kitchen refits, timber frames, carpet replacement, and moving house.',
                'is_active' => true,
            ],
            [
                'name' => '6m³ Builder Skip',
                'capacity_m3' => 6.0,
                'wheelie_bins_equiv' => 24,
                'dimensions' => '3.6m x 1.5m x 1.2m',
                'base_price' => 590.00,
                'description' => 'Trade choice for full house cleanouts, roofing iron, timber demolition, and bulky waste.',
                'is_active' => true,
            ],
            [
                'name' => '8m³ Commercial Skip',
                'capacity_m3' => 8.0,
                'wheelie_bins_equiv' => 32,
                'dimensions' => '4.0m x 1.6m x 1.5m',
                'base_price' => 750.00,
                'description' => 'High capacity container for major multi-room demolition, office strip-outs, and farm sites.',
                'is_active' => true,
            ],
            [
                'name' => '10m³ Jumbo Hooklift',
                'capacity_m3' => 10.0,
                'wheelie_bins_equiv' => 40,
                'dimensions' => '4.5m x 1.6m x 1.6m',
                'base_price' => 920.00,
                'description' => 'Heavy civil contractor bin for retail fit-outs, factory clearances, and deceased estates.',
                'is_active' => true,
            ],
            [
                'name' => '12m³ Mega Industrial',
                'capacity_m3' => 12.0,
                'wheelie_bins_equiv' => 48,
                'dimensions' => '5.0m x 1.7m x 1.7m',
                'base_price' => 1080.00,
                'description' => 'Maximum volume hooklift bin for large industrial cleanups, scrap metal, and major projects.',
                'is_active' => true,
            ],
        ];

        foreach ($binSizes as $bin) {
            BinSize::updateOrCreate(
                ['name' => $bin['name']],
                $bin
            );
        }

        // 3. Waste Types
        $wasteTypes = [
            [
                'name' => 'General Household Waste',
                'surcharge' => 0.00,
                'allowed_materials' => ['Furniture', 'Appliances', 'Drywall', 'Timber', 'Carpet', 'Plastics'],
                'banned_materials' => ['Asbestos', 'Wet Paint', 'Chemicals', 'Tyres', 'Food Waste'],
            ],
            [
                'name' => 'Green / Organic Waste',
                'surcharge' => 0.00,
                'allowed_materials' => ['Tree branches', 'Grass clippings', 'Leaves', 'Garden mulch', 'Untreated wood'],
                'banned_materials' => ['Soil', 'Plastic bags', 'Food waste', 'Treated timber'],
            ],
            [
                'name' => 'Heavy Builder / Renovation',
                'surcharge' => 65.00,
                'allowed_materials' => ['Bricks', 'Roof tiles', 'Concrete rubble', 'Clean soil', 'Masonry'],
                'banned_materials' => ['Asbestos (strictly prohibited)', 'Liquid hazardous chemicals'],
            ],
        ];

        foreach ($wasteTypes as $type) {
            WasteType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}