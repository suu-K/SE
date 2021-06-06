<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'url',
        'event_id'
    ];

    public function product(){
        return $this->belongsTo('App\Models\product');
    }

    public function event(){
        return $this->belongsTo('App\Models\event');
    }
}
