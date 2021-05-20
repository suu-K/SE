<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use Notifiable;



    protected $fillable = [
        'email',
        'password',
        'name',
        'phone',
        'birth'
    ];

    public function Cart(){
        return $this->hasMany('App\Models\Cart');
    }

    public function address(){
        return $this->hasMany('App\Models\address');
    }

}
