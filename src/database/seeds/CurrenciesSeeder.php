<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach((new Countries())->currencies() as $currency){
            Currency::create([
                'code' => $currency->iso->code,
                'display_value' => $currency->iso->code.' - '.$currency->name,
                'description' => $currency->name
            ]);
        }        
    }
}
