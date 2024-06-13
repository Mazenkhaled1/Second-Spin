<?php

namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreditCardRequest;
use App\Http\Requests\Orders\OrdersRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Http\Resources\Orders\PaymentSummaryOrderResource;
use App\Http\Service\Orders\OrdersService;
use App\Models\Order;

class OrdersController extends Controller
{
    protected $ordersService;
    public function __construct(OrdersService $ordersService)
    {
        $this->ordersService = $ordersService;

    }
    
    public function checkout(OrdersRequest $request , CreditCardRequest $creditCardRequest)
    {
    $data = $this->ordersService->store($request ,$creditCardRequest ) ; 
        if($data) 
        
                return $this->apiResponseStored(new OrderResource($data)) ; 
    }

    public function paymentSummary()
    {
        $user = auth()->user();
        if ($user) {
            $payment = Order::where('user_id', $user->id)->orderBy('id', 'desc')->first();
            if ($payment) {
                return $this->apiResponse(new PaymentSummaryOrderResource($payment), 'Payment Summary Retrieved');
            } 
        }
    }
   

}