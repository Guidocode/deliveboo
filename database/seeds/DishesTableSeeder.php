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
        $dishes = [
            // 'Carbonara','Margherita','Usamaki Roll','Amatriciana','Big Mac','Tiramisu','Fiorentina',
            // 'Nachos','Hamburger','Tender','KingBurger','Falafel','Involtini Primavera','Nuggets',
            // 'Diavola','Cacio e Pepe','Filetto','Noodles','Fish&Chips','Norma','Hummus','Panelle',
            // 'Sfincione','Gamberetti','Arrosticini',

            ['name' => 'Carbonara', 'image_db' => 'https://blog.giallozafferano.it/albe/wp-content/uploads/2020/08/15FA1142-B5FA-410C-878B-2B8745B85F64.jpeg'],
            ['name' => 'Margherita', 'image_db' => 'https://cdn.shopify.com/s/files/1/0586/6795/8427/articles/Margherita-9920.jpg?crop=center&height=800&v=1644590028&width=800'],
            ['name' => 'Usamaki Roll', 'image_db' => 'https://blog.giallozafferano.it/dulcisinforno/wp-content/uploads/2018/05/1467Mod.jpg'],
            ['name' => 'Amatriciana', 'image_db' => 'https://www.tavolartegusto.it/wp/wp-content/uploads/2022/04/Amatriciana.jpg'],
            ['name' => 'Big Mac', 'image_db' => 'https://www.junkfully.com/wp-content/uploads/2016/12/Big-Mac.png'],
            ['name' => 'Tiramisu', 'image_db' => 'https://media-assets.vanityfair.it/photos/614d9f474867ab37920b024a/3:2/w_1206,h_804,c_limit/P20.jpg'],
            ['name' => 'Fiorentina', 'image_db' => 'https://www.braciamiancora.com/wp-content/uploads/2015/08/Bistecca-Fiorentina-Boccanegra-Firenze-5.jpg'],
            ['name' => 'Nachos', 'image_db' => 'https://www.fattoincasadabenedetta.it/wp-content/uploads/2022/02/AdobeStock_60789987.jpeg'],
            ['name' => 'Hamburger', 'image_db' => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2018/02/ricetta-hamburger-640x480.jpg'],
            ['name' => 'Tender', 'image_db' => 'https://a57.foxnews.com/static.foxnews.com/foxnews.com/content/uploads/2018/09/640/320/e1142e7d-meat.jpg?ve=1&tl=1'],
            ['name' => 'KingBurger', 'image_db' => 'https://cdn.jumpgroup.it/sites/siriospa/uploads/2019/07/20455sirio-burger-king.jpg'],
            ['name' => 'Falafel', 'image_db' => 'https://www.greenme.it/wp-content/uploads/2013/01/falafel.jpg'],
            ['name' => 'Involtini Primavera', 'image_db' => 'https://www.giallozafferano.it/images/ricette/230/23004/foto_hd/hd650x433_wm.jpg'],
            ['name' => 'Nuggets', 'image_db' => 'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2014/10/Nuggets-di-pollo-53183-3.jpg'],
            ['name' => 'Diavola', 'image_db' => 'https://i1.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2017/06/3236_Pizza.jpg?resize=895%2C616&ssl=1'],
            ['name' => 'Cacio e Pepe', 'image_db' => 'https://blog.giallozafferano.it/dulcisinforno/wp-content/uploads/2021/01/Pasta-cacio-e-pepe-2634.jpg'],
            ['name' => 'Filetto', 'image_db' => 'https://www.ilcuoreinpentola.it/wp-content/uploads/2020/05/filetto-in-padella-2.jpg'],
            ['name' => 'Noodles', 'image_db' => 'https://avegtastefromatoz.com/wp-content/uploads/2022/01/Noodle-steps-FI.jpg'],
            ['name' => 'Fish&Chips', 'image_db' => 'https://wips.plug.it/cips/buonissimo.org/cms/2020/06/74558125_s.jpg'],
            ['name' => 'Norma', 'image_db' => 'https://cookieandkate.com/images/2020/09/pasta-alla-norma-recipe-3.jpg'],
            ['name' => 'Hummus', 'image_db' => 'https://www.cucchiaio.it/content/dam/cucchiaio/it/ricette/2014/07/ricetta-hummus-ceci/_MG_1465_orizz.jpg'],
            ['name' => 'Panelle', 'image_db' => 'https://www.mangiarebuono.it/wp-content/uploads/2014/04/panelle-anteprima.jpg'],
            ['name' => 'Sfincione', 'image_db' => 'https://magazine.giallozafferano.it/wp-content/uploads/2016/07/sfincione-palermitano.jpg'],
            ['name' => 'Gamberetti', 'image_db' => 'https://www.ilgiornaledelcibo.it/wp-content/uploads/2009/04/insalata-di-gamberetti-senza-nome.jpg'],
            ['name' => 'Arrosticini', 'image_db' => 'https://www.yesabruzzo.com/wp-content/uploads/2017/03/arrosticini-strettch.jpg'],

        ];

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->name = $dish['name'];
            $new_dish->user_id = User::inRandomOrder()->first()->id;
            $new_dish->description = $faker->text(6);
            $new_dish->price = $faker->randomFloat(2,3,50);
            $new_dish->image_db = $dish['image_db'];
            $new_dish->save();
        }
    }
}
