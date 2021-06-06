<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'class',
        'sale_price',
        'max_sale_price',
        'sale_percent',
        'category',
        'condition',
        'ldate',
        'title'
    ];
}
