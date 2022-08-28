<?php

use Illuminate\Database\Seeder;
use App\User;
Use App\Type;

class TypeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 20; $i++){
            
            $type = Type::inRandomOrder()->first()->id;           

            $user = User::inRandomOrder()->first();

            $user->types()->attach($type);
           
        }
    }
}
