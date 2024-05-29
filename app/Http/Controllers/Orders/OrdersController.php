<?php

namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrdersRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Http\Service\Orders\OrdersService;


class OrdersController extends Controller
{
    protected $ordersService;
    public function __construct(OrdersService $ordersService)
    {
        $this->ordersService = $ordersService;

    }
    
    public function checkout(OrdersRequest $request)
    {
    $data = $this->ordersService->store($request) ; 
        if($data) 
        
                return $this->apiResponseStored(new OrderResource($data)) ; 
    }
   

}