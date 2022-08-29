<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index(){
        $users = User::with('types')->with('dishes')->get();

        return response()->json(compact('users'));
    }
}
