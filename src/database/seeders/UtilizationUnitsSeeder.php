<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UtilizationUnit;

class UtilizationUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UtilizationUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'km',
            'description' => 'Kilometer',
        ]);
        UtilizationUnit::create([
            'id' => Str::uuid(),
            'display_value' => 'mi',
            'description' => 'Miles',
        ]);
    }
}
