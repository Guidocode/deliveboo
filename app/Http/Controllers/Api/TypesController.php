<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypesController extends Controller
{
    public function index(){

        $types = Type::all();

        return $types;
    }
}
