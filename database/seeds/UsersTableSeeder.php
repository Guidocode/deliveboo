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
        ['name' => 'McDonald\'s', 'email' => 'mc@donald.com'],
        ['name' => 'KFC', 'email' => 'KFC@mail.com'],
        ['name' => 'Burger King', 'email' => 'Burger@King.com'],
        ['name' => 'Olive Garden', 'email' => 'Olive@Garden.com'],
        ['name' => 'Tacos y Taco', 'email' => 'Taco@King.com'],
        ['name' => 'Pizza E Mandolino', 'email' => 'Pizza@gmail.com'],
        ['name' => 'Mondrago', 'email' => 'Mondrago@mail.com'],
        ['name' => 'Poke House', 'email' => 'Poke@lols.com'],
        ['name' => 'SushiKO', 'email' => 'Sushiko@gmail.com']
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
           $new_user->save();
        }
    }
}
