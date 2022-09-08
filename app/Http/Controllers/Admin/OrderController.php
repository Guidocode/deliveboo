<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $orders = Dish::where('dishes.user_id',$id)->with('orders')->get();

        return view('admin.order.index',compact('orders'));
    }
    public function show(Order $order)
    {
    }
}
