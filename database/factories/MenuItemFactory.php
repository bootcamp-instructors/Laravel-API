<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        // Generator
       
//         $faker->beverageName();  // A random Beverage Name
//         $faker->dairyName();  // A random Dairy Name
//         $faker->vegetableName();  // A random Vegetable Name
//         $faker->fruitName();  // A random Fruit Name
//         $faker->meatName();  // A random Meat Name
//         $faker->sauceName();  // A random Sauce Name
        return [
          'name' => $faker->unique()->beverageName()
        ];
    }
}
