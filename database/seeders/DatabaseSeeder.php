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
            UserSeeder::class
            // ProductSeeder::class,
            // PurchaseSeeder::class,
            // ShippingSeeder::class,
            // OrderSeeder::class,
        ]);
    }
}
