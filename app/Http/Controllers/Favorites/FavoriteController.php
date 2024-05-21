<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\FavoriteRequest;
use App\Http\Resources\Favorites\AddFavoriteResource;
use App\Http\Resources\Favorites\FavoriteListResource;
use App\Http\Service\Favorites\FavoriteService;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    
    protected $favoriteService;
    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;

    }

     public function index(){
        $user = auth()->user() ;
        $favorites = Favorite::get(); 
        if ($user) {
            return $this->apiResponse(FavoriteListResource::collection($favorites),'favorites List Retrieved Successfully');
        }
    }

     
     public function store(FavoriteRequest $request , $id)
     {
         $favorite = $this->favoriteService->store($request ,$id);
         if($favorite){
             return $this->apiResponseStored(new AddFavoriteResource($favorite)); 
         }
             return $this->apiResponse([] ,'Not Found ' , 404) ; 
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