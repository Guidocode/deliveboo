<?php

use Illuminate\Database\Seeder;
use App\Dish;
use Faker\Generator as Faker;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = ['Carbonara','Margherita','Usamaki Roll','Amatriciana','Big Mac','Tiramisu','Fiorentina','Nachos','Hamburger','Tender','KingBurger','Falafel','Involtini Primavera','Nuggets','Diavola','Cacio e Pepe','Filetto','Noodles','Fish&Chips','Norma','Hummus','Panelle','Sfincione','Gamberetti','Arrosticini'];

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->name = $dish;
            $new_dish->description = $faker->text(6);
            $new_dish->price = $faker->randomFloat(2,3,50);
            $new_dish->save();
        }
    }
}
