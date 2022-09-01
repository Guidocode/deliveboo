<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       $users = [
        ['name' => 'McDonald\'s', 'email' => 'mc@donald.com', 'image' => 'https://rsienergia.files.wordpress.com/2012/05/eaf891c442s-logo.gif'],
        ['name' => 'KFC', 'email' => 'KFC@mail.com', 'image' => 'https://www.retailfood.it/wp-content/uploads/2020/07/kfc-2-e1595605097522.jpg'],
        ['name' => 'Burger King', 'email' => 'Burger@King.com', 'image' => 'https://maximoshopping.it/wp-content/uploads/media/negozi/logo/logo-burger-king-600x450.png'],
        ['name' => 'Olive Garden', 'email' => 'Olive@Garden.com', 'image' => 'https://www.bitrefill.com/content/cn/v1553065823/olive-garden.svg'],
        ['name' => 'Tacos y Taco', 'email' => 'Taco@King.com', 'image' => 'https://thumbs.dreamstime.com/z/tacos-fire-hot-taco-mexican-restaurant-emblem-hipster-vintage-logo-tacos-fire-hot-taco-mexican-restaurant-emblem-hipster-157254734.jpg'],
        ['name' => 'Pizza E Mandolino', 'email' => 'Pizza@gmail.com', 'image' => 'https://cdns-images.dzcdn.net/images/cover/2a048b6e0dbb67c304689d9117c86a1a/500x500.jpg'],
        ['name' => 'Mondrago', 'email' => 'Mondrago@mail.com', 'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/06/2f/27/8f/pizzeria-et-restaurant.jpg'],
        ['name' => 'Poke House', 'email' => 'Poke@lols.com', 'image' => 'https://media.poke-house.com/wp-content/uploads/2020/12/carosello.jpg'],
        ['name' => 'SushiKO', 'email' => 'Sushiko@gmail.com', 'image' => 'https://sushikojax.com/images/about-slide03.jpg']
       ];

       foreach ($users as $user) {
           $new_user = new User();
           $new_user->name = $user['name'];
           $new_user->email = $user['email'];
           $new_user->slug = User::generateSlug($new_user->name);
           $new_user->password = Hash::make('password');
           $new_user->address = $faker->address();
           $new_user->vat_number = $faker->numberBetween(10000000000, 99999999999);
           $new_user->phone = $faker->e164PhoneNumber();
           $new_user->image = $user['image'];
           $new_user->save();
        }
    }
}
