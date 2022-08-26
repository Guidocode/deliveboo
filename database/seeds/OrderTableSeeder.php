<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 30; $i++){
            $new_order = new Order();
            $new_order->client_name = $faker->firstName();
            $new_order->client_surname = $faker->lastName();
            $new_order->client_address = $faker->streetAddress();
            $new_order->client_phone = $faker->e164PhoneNumber();
            $new_order->client_email = $faker->email();
            $new_order->note = $faker->sentence();
            $new_order->total_price = $faker->randomFloat(2,3,50);
            $new_order->save();
        }
    }
}
