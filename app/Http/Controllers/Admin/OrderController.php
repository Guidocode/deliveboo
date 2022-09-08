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
        // $orders = User::where('id', Auth::user()->id)->with('dishes')->with('orders')->get();
        // $orders = DB::table('dish_order')
        // ->select('orders.id','dishes.*')
        // ->join('dishes','dish_order.dish_id','dishes.id' )
        // ->join('users','users.id','dishes.user_id' )
        // ->join('orders','orders.id','dish_order.order_id')
        // ->where('users.id', Auth::user()->id)
        // ->groupBy('dish_order.order_id')
        // ->get();

        // $posts = App\Post::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', 'foo%');
        // })->get();

    //    $orders = Dish::whereHas('user',function (Builder $query) {
    //         $query->where('user_id', '=', 1);
    //      })
    //      ->with('orders')
    //      ->get();

    //    $orders = Order::with(['dishes' => function( $query){
    //     $query->join('users','users.id','dishes.user_id')->where('users.id','=',1);

    //    }])->get();


        // return view('admin.order.index',compact('orders'));
        return response()->json($orders);


    }

    public function show(Order $order)
    {
    }
}
