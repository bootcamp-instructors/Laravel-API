<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealType;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['breakfast', 'lunch', 'dinner', 'drinks', 'sides', 'desserts', 'appetizers', 'snacks'];
        for($i = 0; $i<count($types);$i++){
            $mealType = new MealType;
            $mealType->type = $types[$i];
            $mealType->save();
        }
    }
}
