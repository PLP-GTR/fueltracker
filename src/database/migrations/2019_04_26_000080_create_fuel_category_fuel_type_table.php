<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelCategoryFuelTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_category_fuel_type', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('Primary key');

            $table->uuid('fuel_category_id')->comment('Foreign key to fuel categories table');
            $table->uuid('fuel_type_id')->comment('Foreign key to fuel types table');

            $table->timestamps();
            
            // Foreign Key Constraints
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->change();
            $table->foreign('fuel_category_id')->references('id')->on('fuel_categories')->change();
        });

        Artisan::call('db:seed', ['--class' => 'FuelCategoryFuelTypeSeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_category_fuel_type');
    }
}
