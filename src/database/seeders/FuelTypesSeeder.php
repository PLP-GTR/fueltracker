<?php

namespace Database\Seeders;

use App\Models\FuelType;
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
                'code' => 'UNDEFINED',
                'display_value' => 'Undefined',
                'description' => 'Undefined',
            ],
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
                'code' => 'PAR',
                'display_value' => 'Kerosene / Paraffin',
                'description' => 'Lamp oil / coal oil / petroleum',
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
                'code' => 'L1',
                'display_value' => 'Level 1 - 110V-120V',
                'description' => 'Standard outlet, long charging time',
            ],
            [
                'code' => 'L2',
                'display_value' => 'Level 2 - 220V-240V',
                'description' => 'Faster charging, SAE J1772 / Tesla HPWC connector',
            ],
            [
                'code' => 'L3',
                'display_value' => 'Level 3 - 480V-500V',
                'description' => 'DCFC - Fast Charger, CHAdeMO / SAE Combo CCS / Tesla supercharger connector',
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
