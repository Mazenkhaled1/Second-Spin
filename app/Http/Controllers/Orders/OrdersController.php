<?php

namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrdersRequest;
use App\Http\Traits\Api\MathHelper;
use App\Models\Cart;
use App\Models\Order;

class OrdersController extends Controller
{
    
    public function checkout(OrdersRequest $request)
    {
           $data=$request->validated(); 
    $user  = auth()->user() ;
    $data['user_id']=$user->id;
    $carts = Cart::where('user_id', $user->id)->with('product')->get();
    
    $product_price = []  ; 
    $cart_id = []  ; 
    foreach($carts as $cart){
       $cart_id[]= $cart->id;
        if($cart->product){

            $product_price[] = $cart->product->price;
            
        }
    }

    dd($cart_id);
    $total=MathHelper::sum($product_price);
    $data['total']=$total;

    if ($data['location'] == 'cairo' || $data['location'] == 'giza') {
        $delivery_fees = 50;
    } else {
        $delivery_fees = 100;
    }    
    $data['delivery_fees']=$delivery_fees;
    $total_price=$total+$delivery_fees;
    $data['total_price']=$total_price;
    if($data){
        $insertOrder = Order::create($data) ;
        return $this->apiResponseStored($insertOrder);
    }
   
   
   
     
    }
   

}