<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreditCardRequest;
use App\Http\Requests\Orders\OrdersRequest;

class PaymentController extends Controller
{
    public function payment(CreditCardRequest $creditCardRequest , OrdersRequest $ordersRequest) 
    {
        // dd($ordersRequest->input('payment_method')) ;
        $paymentMethod = $ordersRequest->input('payment_method') ;

        if($paymentMethod == 'cash') 
        {
            $request = $ordersRequest->validated() ; 
            $user  = auth()->user() ;
            $data = $request ; 
            $data['user_id'] = $user->id;
            dd($data) ;
            

        }


        elseif($paymentMethod == 'credit card')
        {
            $request = $creditCardRequest->validated() ; 
            dd($request) ; 
        }
    }
}
