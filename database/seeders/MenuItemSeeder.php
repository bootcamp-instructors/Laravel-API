<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breakfasts = [];
        for($i = 0; $i<count($breakfasts);$i++){
            $menuItem = new MenuItem;
            $menuItem->name = $breakfasts[$i];
            $menuItem->meal_type_id->1;
            $menuItem->save();
        }
    }
}
