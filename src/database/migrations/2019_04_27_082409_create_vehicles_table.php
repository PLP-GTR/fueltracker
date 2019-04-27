<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->uuid('user_id')->comment('Foreign key to users table');
            $table->boolean('is_active')->default(true)->comment('Is vehicle currently in use and displayed in dropdowns etc?');
            $table->string('name')->nullable()->comment('Main displayed headline (auto-generated if empty)');
            $table->string('description')->nullable()->comment('Subline when showing vehicle');
            
            // Units
            $table->uuid('utilization_unit_id')->comment('Foreign key to distance units table; Common are km/mi/nm/h');
            $table->uuid('fuel_unit_id')->comment('Foreign key to fuel units table; Common are litre/gallons (uk/us)/kWh');
            $table->uuid('consumption_unit_id')->comment('Foreign key to consumption units table; Common are mpg, l/100km, kWh/100km');

            // Additional, very unnecessary information for the application
            $table->string('make')->nullable()->comment('Make of car i.e. Audi/BMW/etc');
            $table->string('model')->nullable()->comment('Model of the car, i.e. A4 2.5TDI/M3 CSL etc');
            $table->string('year')->nullable()->comment('Year the car was built');
            $table->string('license_plate')->nullable()->comment('License plate');
            $table->string('vin')->nullable()->comment('Vehicle identification number');
            $table->string('insurance')->nullable()->comment('Insurance name/number');

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
        Schema::dropIfExists('vehicles');
    }
}
