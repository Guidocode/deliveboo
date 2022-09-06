<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_name', 'client_surname', 'client_email','client_phone', 'client_address', 'total_price'];

    public function dishes(){
        return $this->belongsToMany('App\Dish')->withPivot('quantity');
    }
}
