<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'product','available','price',
    ];
    
    public function orders()
    {
        return $this->belongsTo('App\Orders','item_id');
    }
    public function cart()
    {
    	return $this->belongsTo('App\Cart','pro_id');
    }
}
