<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Carbon;
use App\Items;
use App\Orders;

use Validator;

class ItemController extends BaseController
{
    public function index()
    {
        $items = Items::all();
        return $this->sendResponse(['items'=>$items],'Success');
    } 
    public function count(){
    	$item = Items::all();
    	
    	foreach ($item as $_item) {
    		$_item->count = count(Orders::whereDate('created_at', '>=', Carbon::today()->subDays(2))->where('item_id',$_item->id)->get());
    		$_item->sold = Orders::whereDate('created_at', '>=', Carbon::today()->subDays(10))->where('item_id',$_item->id)->get();
    	}

    	 //$most_sold = $item->sortBy($item->count,'DESC')->take(3)->get();
    	return $this->sendResponse(['items'=>$item,'most_sold'=>$most_sold],'Success');
    }   
}
