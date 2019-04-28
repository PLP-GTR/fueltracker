<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelCategoryFuelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_category_fuel_types', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('Primary key');

            $table->uuid('fuel_category_id')->comment('Foreign key to fuel categories table');
            $table->uuid('fuel_type_id')->comment('Foreign key to fuel types table');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_category_fuel_types');
    }
}
