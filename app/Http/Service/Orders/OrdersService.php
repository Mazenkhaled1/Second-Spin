<?php

namespace App\Http\Service\Orders;

use App\Http\Requests\Orders\OrdersRequest;
use App\Http\Traits\Api\MathHelper;
use App\Models\Cart;
use App\Models\Order;

class OrdersService
{
    
    public function store(OrdersRequest $request)
    {
        $data=$request->validated(); 
        $user  = auth()->user() ;
        $data['user_id']=$user->id;
        $carts = Cart::where('user_id', $user->id)->with('product')->get();
        
        $product_price = []  ; 
        
        foreach($carts as $cart){
            if($cart->product){
    
                $product_price[] = $cart->product->price;
                
            }
        }
    
        
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
            $insertOrder = Order::create($data) ;
            return $insertOrder;
       
    }

}
