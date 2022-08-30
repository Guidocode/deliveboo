<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USE App\Dish;

class DishController extends Controller
{

    public function store(DishRequest $request)
    {
        $new_dish = new Dish();
        $data = $request->all();
        $data = $request->validate(
            [
            'name' => 'required ',
            'price' => 'required ',
            'description' => 'required',
            'user_id' => 'required',
            ]) ;







        $new_dish->fill($data);
        $new_dish->save();

        return $new_dish;
    }
}
