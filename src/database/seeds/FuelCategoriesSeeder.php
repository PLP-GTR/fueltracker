<?php

use Illuminate\Database\Seeder;
use App\FuelCategory;

class FuelCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
        $fuelCategories = coollect([
            [
                'code' => 'UNDEFINED',
                'display_value' => 'Undefined',
                'description' => 'Please choose a category'
            ],
            [
                'code' => 'PTRL',
                'display_value' => 'Petrol / Gas',
                'description' => 'Petrol / Gas',
            ],
            [
                'code' => 'DSL',
                'display_value' => 'Diesel',
                'description' => 'Diesel',
            ],
            [
                'code' => 'GAS',
                'display_value' => 'Natural Gas',
                'description' => 'Liquified or compressed gases',
            ],
            [
                'code' => 'ELEC',
                'display_value' => 'Electric',
                'description' => 'Electric',
            ],
            [
                'code' => 'ETH',
                'display_value' => 'Ethanol',
                'description' => 'Ethanol',
            ],
            [
                'code' => 'FLEX',
                'display_value' => 'Flexfuel',
                'description' => 'Flexible Fuel (FFV) / Dual-Fuel',
            ],
            [
                'code' => 'OTHER',
                'display_value' => 'Other',
                'description' => 'Unlisted',
            ],
        ]);

        $fuelCategories->each(function($fuelCategory){
            FuelCategory::create([
                'id' => Str::uuid(),
                'code' => $fuelCategory->code,
                'display_value' => $fuelCategory->display_value,
                'description' => $fuelCategory->description,
            ]);
        });
    }
}
