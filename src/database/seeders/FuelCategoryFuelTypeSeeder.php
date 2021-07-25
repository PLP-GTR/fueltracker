<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FuelCategory;
use App\Models\FuelCategoryFuelType;
use App\Models\FuelType;
use Illuminate\Support\Arr;

class FuelCategoryFuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = coollect([
            // Petrol / Gasoline related
            'PTRL' => [
                'P91',
                'E10',
                'P95',
                'P98',
                'P100',
                'P102',
                'E85',
                'PAR',
                'UNDEFINED',
            ],

            // Diesel related
            'DSL' => [
                'D',
                'DP',
                'BD',
                'DEF',
                'UNDEFINED',
            ],

            // Natural Gas related
            'GAS' => [
                'LPG',
                'CNG',
                'LNG',
                'HY',
                'UNDEFINED',
            ],

            // Electric vehicle related
            'ELEC' => [
                'L1',
                'L2',
                'L3',
                'UNDEFINED',
            ],

            // Ethanol related
            'ETH' => [
                'E10',
                'E85',
                'UNDEFINED',
            ],
        ]);

        $fuelCategories = FuelCategory::all();
        $fuelTypes = FuelType::all();

        $relations->each(function($types, $category) use ($fuelCategories, $fuelTypes){
            $types->each(function($type) use ($category, $fuelCategories, $fuelTypes){
                FuelCategoryFuelType::create([
                    'id' => Str::uuid(),
                    'fuel_category_id' => $fuelCategories->where('code', $category)->first()->id,
                    'fuel_type_id' => $fuelTypes->where('code', $type)->first()->id,
                ]);
            });
        });
    }
}
