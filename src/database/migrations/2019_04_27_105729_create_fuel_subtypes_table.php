<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_subtypes', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->uuid('fuel_type_id')->comment('Foreign key to fuel types table');
            $table->string('display_value')->comment('Useful to display');
            $table->string('description')->nullable()->comment('Helpful description to the user');

            // Default
            $table->timestamps();

            $table->unique(['fuel_type_id', 'display_value']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuel_subtypes');
    }
}
