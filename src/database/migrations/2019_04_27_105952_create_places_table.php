<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            // Main information
            $table->uuid('id')->primary()->comment('Primary key');
            $table->uuid('user_id')->comment('Foreign key to users table');
            $table->string('name')->comment('Name of place or gas station');
            $table->string('description')->nullable()->comment('More or less detailed than the name');

            $table->string('brand')->nullable()->comment('See OpenStreetMap Brands, i.e. BP, HEM etc');
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            
            // Address of the place
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();

            // Links to APIs
            $table->string('google_place_id')->nullable();
            

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
        Schema::dropIfExists('places');
    }
}
