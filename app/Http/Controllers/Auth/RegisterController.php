<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Type;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'max:15', 'min:10' ], //
            'address' => ['required','max:255'],
            'vat_number'=>['required','digits:11']
        ]);
    }
    public function showRegistrationForm()
    {
        $types = Type::all();
        return view("auth.register", compact("types"));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
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

        if (request()->hasFile('image') != null) {

            $original_name_image = request()->file('image')->getClientOriginalName();


            $image = Storage::put('uploads', request()->file('image'));

            $user->update(['image' => $image, 'original_name_image' => $original_name_image]);
        }

        // dd($data);

        foreach ($data['types'] as $type) {
            $user->types()->attach($type);
        }

        return $user;
    }

}
