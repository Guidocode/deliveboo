<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class FilterResturant extends Controller
{
    public function index(Request $request){

        $r = $request->ids;
        $selectedTypes=[];
        foreach ($r as $id) {
            $resturants = Type::where('id', $id)->with('users')->get();
            foreach ($resturants as  $resturant) {
                $users = $resturant->users;
                foreach ($users as  $user) {
                    $selectedTypes[]= $user;
                }

            }
        }
        //  $resturant = Type::where('id', $r[0])->with('users')->get();
        //  $selectedTypes[] = $resturant[0]->users;

        return response()->json(compact('selectedTypes'));
    }
}
