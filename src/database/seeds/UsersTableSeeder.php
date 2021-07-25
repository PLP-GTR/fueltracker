<?php

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create()->each(function ($user) {
            $user->vehicles()->save(factory(Vehicle::class)->make());
        });
    }
}
