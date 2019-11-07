<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelings', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('Primary key');
            $table->uuid('vehicle_id')->nullable()->comment('Foreign key to vehicles table');
            $table->dateTimeTz('refueled_at')->nullable()->comment('When the vehicle was refueled, receipt date');

            // Costs
            $table->float('costs')->nullable()->comment('Costs of the fueling');
            $table->float('amount')->nullable()->comment('Amount of fuel');
            $table->float('costs_per_capacity')->nullable()->comment('If known, costs per 1 capacity can be used to calculate the costs (i.e. if several items are on the receipt)');
            $table->uuid('currency_id')->nullable()->comment('Foreign key to currencies table; Currency of the fueling costs, i.e. EUR/USD etc');

            // Vehicle uitilization / Milage
            $table->float('utilization_overall', 7, 2)->nullable()->nullable()->comment('Overall utilization of the vehicle at fueling');
            $table->float('utilization_trip', 7, 2)->nullable()->nullable()->comment('Trip/partial utilization since last fueling');
            $table->uuid('utilization_unit_id')->nullable()->comment('Foreign key to distance units talbe; Common ones are km/mi/nm/h');

            // Types and other things
            $table->uuid('fuel_type_id')->nullable()->comment('Foreign key to fuel subtypes table; Fuel subtypes are Super (95), Super Plus (98) etc');
            $table->uuid('payment_type_id')->nullable()->comment('Foreign key to payment types table; Payment types are debit card, credit card, cash etc');
            $table->uuid('capacity_unit_id')->nullable()->comment('Foreign key to capacity types table; Examples are liter, gallons etc');
            $table->uuid('place_id')->nullable()->comment('Foreign key to places table; Table contains places of map and geocoding providers');
            $table->json('custom_fields')->nullable()->comment('If the user wants to add more information');

            // Default
            $table->timestamps();
            
            // Foreign Key Constraints
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->change();
            $table->foreign('utilization_unit_id')->references('id')->on('utilization_units')->change();
            $table->foreign('currency_id')->references('id')->on('currencies')->change();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->change();
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->change();
            $table->foreign('capacity_unit_id')->references('id')->on('capacity_units')->change();
            $table->foreign('place_id')->references('id')->on('places')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuelings');
    }
}
