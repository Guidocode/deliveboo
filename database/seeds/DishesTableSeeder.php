<?php

use Illuminate\Database\Seeder;
use App\Dish;
use Faker\Generator as Faker;
use App\User;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = config('DishesList');

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->name = $dish['name'];
            $new_dish->user_id = $dish['user_id'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->image_db = $dish['image_db'];
            $new_dish->save();
        }
    }
}
