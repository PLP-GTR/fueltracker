<?php

use Illuminate\Database\Seeder;
use App\FuelCategory;
use App\FuelType;

class FuelCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Undefined',
            'description' => 'Undefined',
        ]);

        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Petrol / Gas',
            'description' => 'Petrol / Gas',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super (ROZ 91)',
            'description' => 'At least unleaded',
        ]);
 
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super E10 (ROZ 95)',
            'description' => 'Petrol with 10% ethanol',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super (ROZ 95)',
            'description' => 'Petrol',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super Plus (ROZ 98)',
            'description' => 'Better petrol',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super 100 (ROZ 100)',
            'description' => 'Better petrol',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Super 102 (ROZ 102)',
            'description' => 'Best petrol',
        ]);

        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Diesel',
            'description' => 'Diesel',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Diesel',
            'description' => 'Standard diesel',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Premium',
            'description' => 'Better diesel offered with proprietary names',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Biodiesel',
            'description' => 'Biodiesel',
        ]);

        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'AdBlue',
            'description' => 'AdBlue',
        ]);

        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'DEF / AUS 32 / AdBlue',
            'description' => 'Diesel exhaust fluid',
        ]);

        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Ethanol',
            'description' => 'Ethanol',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'LPG',
            'description' => 'Liquified petroleum gas (ROZ ~110)',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'CNG',
            'description' => 'Compressed natural gas (ROZ ~130)',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'LNG',
            'description' => 'Liquified natural gas',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Electric',
            'description' => 'Electric',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Flexfuel',
            'description' => 'Flexible Fuel (FFV) / Dual-Fuel',
        ]);
        FuelCategory::create([
            'id' => Str::uuid(),
            'display_value' => 'Other',
            'description' => 'Unlisted',
        ]);
    }
}
