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
            $table->uuid('vehicle_uuid')->comment('Foreign key to vehicles table');
            $table->dateTimeTz('refueled_at')->comment('When the vehicle was refueled');
            $table->float('utilization_overall', 7, 2)->nullable()->comment('Overall utilization of the vehicle at fueling');
            $table->float('utilization_trip', 7, 2)->nullable()->comment('Trip/partial utilization since last fueling');
            $table->uuid('utilization_unit')->comment('Foreign key to distance units talbe; Common ones are km/mi/nm/h');
            $table->float('costs')->comment('Costs of the fueling');
            $table->float('costs_per_volume')->comment('If known, costs per volume can be used to calculate the costs (i.e. if several items are on the receipt)');
            $table->uuid('currency_uuid')->comment('Foreign key to currencies table; Currency of the fueling costs, i.e. EUR/USD etc');
            $table->uuid('place_uuid')->comment('Foreign key to places table; Table contains places of map and geocoding providers');
            $table->uuid('fuel_type_uuid')->comment('Foreign key to fuel types table; Fuel types are Super (95), Super Plus (98) etc');
            $table->uuid('payment_type_uuid')->comment('Foreign key to payment types table; Payment types are debit card, credit card, cash etc');
            $table->json('custom_fields')->comment('If the user wants to add more information');
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
        Schema::dropIfExists('fuelings');
    }
}
