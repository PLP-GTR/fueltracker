<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Uuid;
use App\CapacityUnit;

class CapacityUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CapacityUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'l',
            'description' => 'Litre',
            'abbreviation' => 'l'
        ]);
        CapacityUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'US.liq.gal',
            'description' => 'US (liquid) gallon',
            'abbreviation' => 'gal'
        ]);
        CapacityUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'Imp.gal',
            'description' => 'Imperial (british) gallon',
            'abbreviation' => 'gal'
        ]);
        CapacityUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'kW⋅h',
            'description' => 'Kilowatt hour',
            'abbreviation' => 'kWh'
        ]);
    }
}
