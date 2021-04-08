<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MealTypeSeeder::class,
            MenuItemSeeder::class,
            
//             ShippingSeeder::class,
//             ProductSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            UserCartSeeder::class,

            CartProductSeeder::class
        ]);
    }
}
