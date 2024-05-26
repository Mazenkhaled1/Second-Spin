<?php

namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller;
use App\Models\Cart;


class OrdersController extends Controller
{
    public function checkout()
    {
          // $data=$request->validated();
    $user  = auth()->user() ;
    $carts = Cart::where('user_id', $user->id)->with('product')->get();
    $product_price = []  ; 
    foreach($carts as $cart){
        if($cart->product){

            $product_price[] = $cart->product->id;
        }
    }
    dd($product_price);
     
    }

}