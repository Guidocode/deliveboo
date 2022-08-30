<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:15', 'min:10' ], //
            'address' => ['required','max:255'],
            'vat_number'=>['required','digits:11']
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'slug'=> User::generateSlug($data['name']),
            'address'=> $data['address'],
            'vat_number'=> $data['vat_number'],
            // ->
        ]);
        foreach ($data['types'] as $type) {
            $user->types()->attach($type);
        }

        return $user;
    }
    }
}
