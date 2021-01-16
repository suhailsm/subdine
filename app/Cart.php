<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'pro_id','quantity',
    ];
    public function products()
    {
        return $this->hasMany('App\Products','pro_id');
    }
}
