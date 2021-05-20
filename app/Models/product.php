<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\image;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'num',
        'image',
        'caption',
        'category',
    ];

    public function Image()
    {
        return $this->hasMany('App\Models\Image', 'product_id');
    }
}
