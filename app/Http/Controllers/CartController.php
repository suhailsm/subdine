<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Products;
use App\Cart;
use Validator;
use Notification;


class CartController extends BaseController
{
    public function create(Request $request)
    {
        // validate input fields
    	 $validator = Validator::make($request->all(), [
            'product_id' => 'required','quantity' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        // new Product Request
          $cart = new Cart([
            'pro_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        $cart->save();

        return $this->sendRes('Your Item is Added to the Cart');
    }
}
