<?php

namespace Database\Seeders;

use App\Models\MealType;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'breakfast',
            'snacks',
            'lunch',
            'appetizers',
            'dinner',
            'sides',
            'desserts',
            'drinks',
            'sauces'
        ];
        for($i = 0; $i<count($types);$i++){
            $mealType = new MealType;
            $mealType->type = $types[$i];
            $mealType->save();
        }
    }
}
