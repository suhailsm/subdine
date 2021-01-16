<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Carbon;
use App\Products;
use App\Orders;

use Validator;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Products::all();
        return $this->sendResponse(['products'=>$products],'Success');
    } 
}
