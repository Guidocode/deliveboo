<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Dish;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id', Auth::id())->orderby('id','desc')->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        $data = $request->validate(
            [
            'name' => 'required ',
            'price' => 'required ',
            'description' => 'required'
            ]) ;

        $data = $request->all();

        $new_dish = new Dish();

        $id = Auth::id();
        $new_dish->user_id = $id;
        $new_dish->fill($data);
        $new_dish->save();

        return redirect()->route('admin.dishes.show', $new_dish)->with('success_msg', $new_dish->name.' '." è stato creato con successo");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // $dish = Dish::find($id);

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // $dish = Dish::find($id);

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, $id)
    {
        $data = $request->all();
        $dish = Dish::find($id);
        $dish->update($data);

        return redirect()->route('admin.dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        
        return redirect()->route('admin.dishes.index')->with('dish_cancellato',  $dish->name . 'è stato eliminato correttamente');
    }
}
