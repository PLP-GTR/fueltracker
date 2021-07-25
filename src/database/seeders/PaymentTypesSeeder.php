<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Other',
            'description' => 'Other or unknown'
        ]);
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Cash',
            'description' => 'Cash'
        ]);
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Credit Card',
            'description' => 'Credit Card'
        ]);
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Debit Card',
            'description' => 'Debit Card'
        ]);
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Apple Pay',
            'description' => 'Apple Pay'
        ]);
        PaymentType::create([
            'id' => Str::uuid(),
            'display_value' => 'Google Pay',
            'description' => 'Google Pay'
        ]);
    }
}
