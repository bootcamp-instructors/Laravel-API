<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippings = ['Get it Yourself','USPS', 'USPS Next Day Air', 'UPS', 'FedEx', 'Amazon Prime 2 Day', 'Amazon 2 Hour Drone', 'Amazon Alpha Negative 2 Day Time Warp Delivery'];
        $costs = [0.00, 0.55, 4.25, 7.50, 12.32, 20.00, 35.00, 75.00, 400000.00];
         for($i = 0; $i<count($shippings);$i++){
            $shipping = new Shipping;
            $shipping->name = $shippings[$i];
            $shipping->cost = $costs[$i];
            $shipping->save();
        }
    }
}
