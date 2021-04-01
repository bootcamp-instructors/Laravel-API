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
            
            UserSeeder::class,
//             ShippingSeeder::class,
            CartSeeder::class,
            UserCartSeeder::class,
//             ProductSeeder::class,
            CartProductSeeder::class
        ]);
    }
}
