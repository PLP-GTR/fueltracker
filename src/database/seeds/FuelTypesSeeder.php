<?php

use App\FuelType;
use Illuminate\Database\Seeder;

class FuelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $fuelTypes = coollect([
            [
                'code' => 'P91',
                'display_value' => 'Super (ROZ 91)',
                'description' => 'At least unleaded',
            ],
            [
                'code' => 'E10',
                'display_value' => 'Super E10 (ROZ 95)',
                'description' => 'Petrol with 10% ethanol',
            ],
            [
                'code' => 'P95',
                'display_value' => 'Super (ROZ 95)',
                'description' => 'Petrol',
            ],
            [
                'code' => 'P98',
                'display_value' => 'Super Plus (ROZ 98)',
                'description' => 'Better petrol',
            ],
            [
                'code' => 'P100',
                'display_value' => 'Super 100 (ROZ 100)',
                'description' => 'Better petrol',
            ],
            [
                'code' => 'P102',
                'display_value' => 'Super 102 (ROZ 102)',
                'description' => 'Best petrol',
            ],
            [
                'code' => 'D',
                'display_value' => 'Diesel',
                'description' => 'Standard diesel',
            ],
            [
                'code' => 'DP',
                'display_value' => 'Premium',
                'description' => 'Better diesel offered with proprietary names',
            ],
            [
                'code' => 'BD',
                'display_value' => 'Biodiesel',
                'description' => 'Biodiesel (BD)',
            ],
            [
                'code' => 'DEF',
                'display_value' => 'DEF / AUS 32 / AdBlue',
                'description' => 'Diesel exhaust fluid',
            ],
            [
                'code' => 'E85',
                'display_value' => 'Ethanol (E85)',
                'description' => 'Ethanol (E85)',
            ],
            [
                'code' => 'LPG',
                'display_value' => 'LPG',
                'description' => 'Liquefied Petroleum Gas (Propane)',
            ],
            [
                'code' => 'CNG',
                'display_value' => 'CNG',
                'description' => 'Compressed Natural Gas',
            ],
            [
                'code' => 'LNG',
                'display_value' => 'LNG',
                'description' => 'Liquefied Natural Gas',
            ],
            [
                'code' => 'HY',
                'display_value' => 'Hydrogen',
                'description' => 'Hydrogen',
            ],
            [
                'code' => 'ELEC',
                'display_value' => 'Electric',
                'description' => 'Electric',
            ],
        ]);

        $fuelTypes->each(function($fuelType){
            FuelType::create([
                'id' => Str::uuid(),
                'code' => $fuelType->code,
                'display_value' => $fuelType->display_value,
                'description' => $fuelType->description,
            ]);
        });
    }
}
