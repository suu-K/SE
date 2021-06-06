<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'state',
        'destination',
        'postcode',
        'address',
        'detailAddress',
        'extraAddress',
        'phone',
        'price',
        'first_product',
        'productNum'
    ];

    public function orderProduct(){
        return $this->hasMany('App\Models\orderProduct');
    }
}
