<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->uuid('vehicle_uuid')->comment('Foreign key to vehicles table');
            $table->string('name')->nullable()->comment('User chosen name / description');
            $table->boolean('is_active')->default(true)->comment('Should the entry be displayed in dropdowns etc?');
            $table->boolean('default')->nullable()->comment('Indicates if this is the default tank to use');

            // Tank capacity
            $table->float('capacity')->comment('The actual capacity of the tank in chosen capacity unit');
            $table->uuid('capacity_unit_uuid')->comment('Foreign key to capacity types table; Examples are liter, gallons etc');

            // Other
            $table->uuid('fuel_type_uuid')->comment('Foreign key to fuel types table; Fuel types are Petrol/Diesel/Electric etc');

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
        Schema::dropIfExists('tanks');
    }
}
