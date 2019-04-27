<?php

use Illuminate\Database\Seeder;
use App\FuelType;

class FuelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Other / undefined',
            'description' => 'Other (unlisted) or undefined',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Petrol / Gas',
            'description' => 'Petrol / Gas',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Diesel',
            'description' => 'Diesel',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'AdBlue',
            'description' => 'AdBlue',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Ethanol',
            'description' => 'Ethanol',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'LPG',
            'description' => 'Liquified petroleum gas (ROZ ~110)',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'CNG',
            'description' => 'Compressed natural gas (ROZ ~130)',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'LNG',
            'description' => 'Liquified natural gas',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Electric',
            'description' => 'Electric',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Flexfuel',
            'description' => 'Flexible Fuel (FFV) / Dual-Fuel',
        ]);
        FuelType::create([
            'id' => Str::uuid(),
            'display_value' => 'Multifuel',
            'description' => 'Multifuel (Diesel like)',
        ]);
    }
}
