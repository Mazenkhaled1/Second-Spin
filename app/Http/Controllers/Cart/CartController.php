<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResource;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Resources\Cart\AddToCartResource;




class CartController extends Controller
{

    public function index() 
    {   
        $user = auth()->user() ;
        $data = Cart::get();
        if($user) {
            return $this->apiResponse(CartResource::collection($data) , 'Cart retrieved successfully ' , 200 ) ;
        }
    }

    public function store(StoreCartRequest $request , $id) 
    {
        $data               = $request->validated() ;
        $user               = auth()->user() ;
        $data['user_id']    = $user->id ;
        $product            = Product::find($id) ;
        $data['product_id'] = $product->id ;
        $existingCartItem   = cart::where([
            'user_id'    => $user->id,
            'product_id' => $product->id
        ])->first() ;
        if($existingCartItem) 
        {
             return $this->apiResponse(null , 'this product is already in cart' , 400) ;
        } 
        $rec =   Cart::create($data) ;
        if($rec) 
        {
            return $this->apiResponseStored(new AddToCartResource($rec)) ;
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


