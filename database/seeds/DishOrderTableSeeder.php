<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\Order;

class DishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 20; $i++){
            
            $dish = Dish::inRandomOrder()->first();           

            $order = Order::inRandomOrder()->first();

            $dish->dishes()->attach($order);
           
        }
    }
}
