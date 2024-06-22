<?php

namespace App\Http\Controllers\Products;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\AllProductsResource;
use App\Http\Resources\Products\ProductDetailsResource;
use App\Http\Service\Products\AllProductsService;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{
    protected $allProductsService;
    public function __construct(AllProductsService $allProductsService)
    {
        $this->allProductsService = $allProductsService;

    }

    public function home()
    {
        $products = $this->allProductsService->index();
        if($products)
        return $this->apiResponse(AllProductsResource::collection($products), 'Products retrieved Successfully' , 200) ;
    }

    public function search(Request $request){
        $word = $request->input('search') ?? null;
        $product = Product::search($word)->where('status' , 'accepting')->get();
        if(count($product)>0){
            return $this->apiResponse(AllProductsResource::collection($product), 'Search Done Successfully' , 200) ;
        }
        return $this->apiResponse([], 'Not Matching ',200);
    }


    public function showDetails($id){
        $product=Product::find($id);
       if($product){
           return $this->apiResponseShow(new ProductDetailsResource($product));
       }
           return $this->apiResponse([],'Product Not Found',401);
    
   }



    
}
