<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = [
        'dish','available','price',
    ];
    
    public function orders()
    {
        return $this->hasMany('App\Orders','item_id');
    }
}
