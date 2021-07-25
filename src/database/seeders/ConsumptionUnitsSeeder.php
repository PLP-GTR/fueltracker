<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsumptionUnit;

class ConsumptionUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'l/100km',
            'description' => 'Liter per 100 kilometers',
            'abbreviation' => 'l/100km'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'mpg (US)',
            'description' => 'Miles per US gallon',
            'abbreviation' => 'mpg'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'mpg (UK)',
            'description' => 'Miles per imperial (british) gallon',
            'abbreviation' => 'mpg'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'km/l',
            'description' => 'Kilometeres per liter',
            'abbreviation' => 'km/l'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'km/gal (US)',
            'description' => 'Kilometeres per US gallon',
            'abbreviation' => 'km/gal'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'km/gal (UK)',
            'description' => 'Kilometeres per imperial (british) gallon',
            'abbreviation' => 'km/gal'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'mi/l',
            'description' => 'Miles per liter',
            'abbreviation' => 'mi/l'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'kW⋅h/100km',
            'description' => 'Kilowatt hours per 100 kilometers',
            'abbreviation' => 'kWh/100km'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'kW⋅h/100mi',
            'description' => 'Kilowatt hours per 100 miles',
            'abbreviation' => 'kWh/100mi'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'km/kW⋅h',
            'description' => 'Kilometeres per kilowatt hour',
            'abbreviation' => 'km/l'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'mi/kW⋅h',
            'description' => 'Miles per kilowatt hour',
            'abbreviation' => 'mi/kWh'
        ]);
        ConsumptionUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'MPGe / MPGge',
            'description' => 'Miles per gallon gasoline equivalent',
            'abbreviation' => 'mi/kWh'
        ]);
    }
}
