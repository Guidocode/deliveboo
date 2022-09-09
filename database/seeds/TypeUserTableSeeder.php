<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $typesUsers = config('TypesUsers');
        

        foreach ($typesUsers as $typeUser){
            DB::table('type_user')->insert([
                'user_id' => $typeUser['user_id'],
                'type_id' => $typeUser['type_id'],
            ]);
           
        }
    }
}
