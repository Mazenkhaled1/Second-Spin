<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;
use App\Http\Requests\Favorites\FavoriteRequest;
use App\Http\Resources\Favorites\AddFavoriteResource;
use App\Http\Resources\Favorites\FavoriteListResource;
use App\Http\Service\Favorites\FavoriteService;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    
    protected $favoriteService;
    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;

    }

     public function index(){
        $user = Auth::user();
        $favorites = Favorite::where('user_id', $user->id)->get(); // can momken nbasy id f el parameter 
        if ($favorites->isEmpty()) {
            return $this->apiResponse([],'No favorites Found',404);
        }
        return $this->apiResponse(FavoriteListResource::collection($favorites),'favorites List Retrieved Successfully');
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
       $user = Auth::user();
       $favorite = Favorite::find($id);
     if ($favorite->user_id !== $user->id) {
        return $this->apiResponse([],'UnAuthorized',401);
     }
     $favorite->delete();
     return $this->apiResponseDeleted();
}


}