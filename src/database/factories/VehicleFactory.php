<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Vehicle;
use Faker\Generator as Faker;
use App\Models\UtilizationUnit;
use App\Models\CapacityUnit;
use App\Models\ConsumptionUnit;
use App\Models\User;

$factory->define(Vehicle::class, function (Faker $faker) {

    return [
        // Main information
        'id' => $faker->unique()->uuid,
        'user_id' => User::inRandomOrder()->first()->id,
        'is_active' => $faker->boolean,
        'name' => $faker->word,
        'description' => $faker->text,
        
        // Units
        'utilization_unit_id' => UtilizationUnit::inRandomOrder()->first()->id,
        'capacity_unit_id' => CapacityUnit::inRandomOrder()->first()->id,
        'consumption_unit_id' => ConsumptionUnit::inRandomOrder()->first()->id,

        // Additional, very unnecessary information for the application
        'make' => $faker->word,
        'model' => $faker->word,
        'year' => $faker->year,
        'license_plate' => $faker->word,
        'vin' => $faker->word,
        'insurance' => $faker->sentence(3),
    ];
});