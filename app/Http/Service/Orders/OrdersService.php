<?php

namespace App\Http\Service\Orders;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Traits\Api\MathHelper;
use App\Http\Requests\Orders\OrdersRequest;
use App\Http\Requests\Orders\CreditCardRequest;
use Illuminate\Support\Facades\DB;


class OrdersService
{
    
    public function store(OrdersRequest $request , CreditCardRequest $creditCardRequest)
    {
        $data            = $request->validated();
        $paymentMethod   = $request->input('payment_method') ;
        $user            = auth()->user() ;
        $data['user_id'] = $user->id;
        $carts           = Cart::where('user_id', $user->id)->with('product')->get();
        
        $product_price = []  ;
        
        foreach($carts as $cart){
            if($cart->product){
    
                $product_price[] = $cart->product->price;
                
            }
        }
        $total         = MathHelper::sum($product_price);
        $data['total'] = $total;
    
        if ($data['location'] == 'cairo' || $data['location'] == 'giza') {
            $delivery_fees = 50;
        } else {
            $delivery_fees = 100;
        }    
        $data['delivery_fees'] = $delivery_fees;
        $total_price           = $total+$delivery_fees;
        $data['total_price']   = $total_price;
    
        if($paymentMethod == 'cash') {

            
            $insertOrder = Order::create($data) ;
            Cart::where('user_id', $user->id)->delete();
            DB::commit();
            return $insertOrder;
            }
            elseif($paymentMethod == 'credit card') { 

                $data['card_number'] = $creditCardRequest->input('card_number') ;
                $insertOrder = Order::create($data) ;
                Cart::where('user_id', $user->id)->delete();
                DB::commit();
                return $insertOrder;
                
        }
    }


    public function paymentSummary()  
    {
        $user = auth()->user() ; 
        $paymentSummary = Order::where('user_id' , $user)->get() ; 

        
    }
}
