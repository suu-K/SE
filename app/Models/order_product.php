<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_list_id',
        'product_id',
        'user_id',
        'state',
        'num',
        'price',
        'comment',
        'question'
    ];

    public function oderList(){
        return $this->belongsTo('App\Models\orderList');
    }
}
