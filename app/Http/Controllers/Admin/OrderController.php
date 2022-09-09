<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('dish_order')
        ->select('orders.*')
        ->join('dishes','dish_order.dish_id','dishes.id' )
        ->join('users','users.id','dishes.user_id' )
        ->join('orders','orders.id','dish_order.order_id')
        ->where('users.id', Auth::user()->id)
        ->groupBy('orders.id')
        ->get();

        return view('admin.order.index',compact('orders'));
        // return response()->json();


    }

    public function show(Order $order)
    {
        $order_content = $order->dishes()->get();
        return view('admin.order.show', compact('order_content'));
    }
}
//
//     }
//     public function show(Order $order)
//     {
//         $order_ids = Auth::user()->dishes()->with('orders')->get()->pluck('orders')->flatten()->unique('id')->pluck('id')->toArray();
//         $dishes = $order->dishes()->get();
//         if (in_array($order->id, $order_ids)) return view('admin.order.show', compact('order', 'dishes'));
//         else abort(404);
