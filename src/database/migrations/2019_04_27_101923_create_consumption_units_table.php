<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumptionUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumption_units', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->string('display_value')->comment('Useful to display');
            $table->string('description')->nullable()->comment('Helpful description to the user');

            // Default
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
        Schema::dropIfExists('consumption_units');
    }
}
