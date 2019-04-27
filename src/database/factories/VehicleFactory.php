<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        // Main information
        'id' => $faker->unique()->uuid,
        //'user_id' => $faker->uuid,
        'is_active' => $faker->boolean,
        'name' => $faker->word,
        'description' => $faker->text,
        
        // Units
        'utilization_unit_id' => $faker->uuid,
        'fuel_unit_id' => $faker->uuid,
        'consumption_unit_id' => $faker->uuid,

        // Additional, very unnecessary information for the application
        'make' => $faker->word,
        'model' => $faker->word,
        'year' => $faker->year,
        'license_plate' => $faker->word,
        'vin' => $faker->word,
        'insurance' => $faker->sentence(3),
    ];
});