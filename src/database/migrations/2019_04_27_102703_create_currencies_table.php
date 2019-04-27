<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            // Main information
            $table->string('id')->primary()->comment('Primary key');
            $table->string('display_value')->unique()->comment('Useful to display');
            $table->string('description')->nullable()->comment('Helpful description to the user');

            // Default
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => 'CurrenciesSeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
