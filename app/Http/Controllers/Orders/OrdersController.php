<?php

namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrdersRequest;
use App\Models\Cart;


class OrdersController extends Controller
{
    public function index()
    {
     
    }

    public function store(OrdersRequest $request)
    {
        $data   = $request->validated() ;
       
    }
}