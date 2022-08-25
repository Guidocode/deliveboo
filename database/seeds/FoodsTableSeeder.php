<?php

use Illuminate\Database\Seeder;
use App\Food;
use Faker\Generator as Faker;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $foods = ['Carbonara','Margherita','Usamaki Roll','Amatriciana','Big Mac','Tiramisu','Fiorentina','Nachos','Hamburger','Tender','KingBurger','Falafel','Involtini Primavera','Nuggets','Diavola','Cacio e Pepe','Filetto','Noodles','Fish&Chips','Norma','Hummus','Panelle','Sfincione','Gamberetti','Arrosticini'];

        foreach ($foods as $food) {
            $new_food = new Food();
            $new_food->name = $food;
            $new_food->description = $faker->text(6);
            $new_food->price = $faker->randomFloat(2,3,50);
            $new_food->save();


        }
    }
}
