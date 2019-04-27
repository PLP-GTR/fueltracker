<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_types', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->string('display_value')->unique()->comment('Useful to display');
            $table->string('description')->nullable()->comment('Helpful description to the user');

            // Default
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => 'FuelTypesSeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_types');
    }
}
