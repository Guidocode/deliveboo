<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index(){
        $users = User::with(['types','dishes'])->get();

        return response()->json(compact('users'));
    }
    public function getType(){
        $types = Type::all();
        return response()->json(compact('types'));
    }

    // public function filteredResearch($type){
    //     $users = User::with(['types','dishes'])->where('types.name','Cinese' )->get();

    //     return response()->json(compact('users'));
    // }


}
