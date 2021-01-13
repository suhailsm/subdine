<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'item_id','quantity',
    ];
    public function items()
    {
    	return $this->belongsTo('App\Orders','item_id');
    }
}
