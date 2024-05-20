<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;


class CartController extends Controller
{
    public function index() 
    {   
        $user = auth()->user() ;
        $data = Cart::get() ;
        if($user) {
            return $this->apiResponse(CartResource::collection($data) , 'Cart retrieved successfully ' , 200 ) ;
        }
    }


    public function destroy($id)
    {
        $user = auth()->user() ;
        $data = Cart::find($id) ;
        if($user) 
        {
        $data->delete() ;
        return $this->apiResponseDeleted() ; 
        } 
    }
}


