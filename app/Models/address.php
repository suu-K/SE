<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'user_id',
        'destination',
        'postcode',
        'address',
        'detailAddress',
        'extraAddress',
        'phone'
    ];

    public function user(){
        return $this->belongsTo('App\Models\user');
    }
}
