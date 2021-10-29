<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function weightedRand($min, $max, $weightedMax)
    {
        $arr = array();
        for ($i = 0; $i < 10; $i++) {
            $arr[] = rand($min, $weightedMax);
        }
        $arr[] = rand($min, $max);
        return $arr[rand(0, 10)];
    }

    public function run()
    {
        $faker = \Faker\Factory::create();

        $tools = [
            "Whopper Plopper",
            "Spin Jig",
            "Jiggin' Spoon",
            'Big Fishing Pole',
            'Medium Fishing Pole',
            'Small Fishing Pole',
            'Just a Giant Stick',
            'I dunno, some rocks?',
            'Tackle Box (empty)',
            'Tackle Box (suprise inside)',
            'Big Boat',
            "Lil Boat",
            'Fancy Reel',
            'Broken Reel',
            'Golden Reel',
            'Average Knife',
            'Hardcore Knife',
            'Canoe',
            'Bass Boat Xtreme',
            'Gun',
            'Dynamite'
        ];
        for ($i = 0; $i < count($tools); $i++) {
            $product = new Product;
            $product->name = $tools[$i];
            $number = $faker->numberBetween($min = 5, $max = 30);
            $product->description = $faker->sentence($nbWords = $number, $variableNbWords = false);
            // $product->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 30, $max = 5000);
            $product->price = $faker->biasedNumberBetween($min = 30, $max = 500, $function = 'Faker\Provider\Biased::linearLow');
            $product->type = 'tool';
            $product->image = $faker->imageUrl(800, 600, 'tool');
            $product->save();
        }

        $accessories = [

            'Live Crickets',
            'Slimy Worms',
            'Not So Slimy Worms',
            'White Crab Meat',
            'Spool of Yarn Fishing Line (100 yds)',
            'Spool of Yarn Fishing Line (1000 yds)',
            'Spool of Nylon Fishing Line (100 yds)',
            'Spool of Nylon Fishing Line (1000 yds)',
            'Spool of Fiberglass Fishing Line (100 yds)',
            'Spool of Fiberglass Fishing Line (1000 yds)',
            'Spool of Metal Fishing Line (100 yds)',
            'Spool of Metal Fishing Line (1000 yds)',
            'Box of Lures (100)',
            'Single Lure',
            'Hard Bait Lure',
            'Soft Bait Lure',
            'Nightcrawlers',
            'Sweet Corn',
            'Ultimate Bait Xtreme',
            'Small Sinker',
            '10LB Sinker (for whales only)',
            'Medium Sinker',
            'A... turtle?',
            'Mystery Creature Loot Box!',
            'Tackle Bag',
            'Assorted Lures',
            'Assorted Tackle',
            'Assorted Bait',
            'Boots',
            'Pair of Beat Up Oakleys',
            'Camo Hat with Orange Brim',
            'Kentucky Smallmouth Bass (pre fished, on ice)'
        ];
        for ($i = 0; $i < count($accessories); $i++) {
            $product = new Product;
            $product->name = $accessories[$i];
            $number = $faker->numberBetween($min = 5, $max = 30);
            $product->description = $faker->sentence($nbWords = $number, $variableNbWords = false);
            // $product->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 200);
            $product->price = $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'Faker\Provider\Biased::linearLow');
            $product->type = 'accessory';
            $product->image = $faker->imageUrl(800, 600, 'fish');
            $product->save();
        }
    }
}
