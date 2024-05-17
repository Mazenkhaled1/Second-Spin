<?php

namespace App\Http\Service\Favorites;
use App\Http\Requests\Favorites\FavoriteRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Product;

class FavoriteService
{
    public function store(FavoriteRequest $request,$id){
        $data = $request->validated() ; 
        $user = Auth::user();
        $data['user_id']  = $user->id  ; 
        $product = Product::find($id) ; 
        $data['product_id'] = $product->id ;
        $favorite =Favorite::create($data) ;
        return $favorite ;
     }
}