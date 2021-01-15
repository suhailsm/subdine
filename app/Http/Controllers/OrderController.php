<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Items;
use Validator;
use Notification;


class OrderController extends BaseController
{
    public function create(Request $request)
    {
        // validate input fields
    	 $validator = Validator::make($request->all(), [
            'item_id' => 'required','quantity' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        // new Product Request
          $order = new Orders([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            
        ]);
        $order->save();
        $item = Items::find($request->item_id);
        if($item->available < $request->quantity){
        $item->available = $item->available - $request->quantity;
   
        $item->save();
 else{
        Notification::send(User::find(1), new Stock($item));
}
        return $this->sendResponse(['order_id'=>$order->id],'Thank You for your order');
    }
}
