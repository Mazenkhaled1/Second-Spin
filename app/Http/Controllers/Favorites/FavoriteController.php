<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\FavoriteRequest;
use App\Http\Resources\Favorites\AddFavoriteResource;
use App\Http\Resources\Favorites\FavoriteListResource;
use App\Models\Favorite;
use App\Models\Product;

class FavoriteController extends Controller
{
    
   

     public function index(){
        $user = auth()->user() ;
        $favorites = Favorite::get()->where('user_id', $user->id); 
        if ($user) {
            return $this->apiResponse(FavoriteListResource::collection($favorites),'favorites List Retrieved Successfully');
        }
    }

     
    public function store(FavoriteRequest $request , $id) 
    {
        $data               = $request->validated() ;
        $user               = auth()->user() ;
        $data['user_id']    = $user->id ;
        $product            = Product::find($id) ;
        $data['product_id'] = $product->id ;
        $existingFavoriteItem   = Favorite::where([
            'user_id'    => $user->id,
            'product_id' => $product->id
        ])->first() ;
        if($existingFavoriteItem) 
        {
             return $this->apiResponse(null , 'this product is already in favorite' , 400) ;
        } 
        $rec =   Favorite::create($data) ;
        if($rec) 
        {
            return $this->apiResponseStored(new AddFavoriteResource($rec)) ;
        }
    }


    public function destroy($id)
     {
        $user = auth()->user() ;
       $favorite = Favorite::find($id);
     if ($user) {
        $favorite->delete();
        return $this->apiResponseDeleted();
    }
   
}


}