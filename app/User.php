<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];
    
    
    public function types(){
      return $this->belongsToMany('App\Type');
    }

    public function dishes(){
        return $this->hasMany('App\Dish');
      }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateSlug($name){
        $slug = Str::slug($name, '-');
        $slug_base = $slug;

        $user_presente = User::where('slug', $slug)->first();
        $counter = 0;

        while($user_presente){
          $slug = $slug_base . '-' .$counter;
          $counter++;
          $user_presente = User::where('slug', $slug)->first();
        }

        return $slug;
      }

}
