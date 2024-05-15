<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Service\Products\AllProductsService;
use App\Http\Resources\Products\ProductDetailsResource;

class ProductFillController extends Controller
{
    /**
     * Handle the incoming request.
     */

     protected $allProductsService;
     public function __construct(AllProductsService $allProductsService)
     {
         $this->allProductsService = $allProductsService;
 
     }
    public function __invoke(ProductRequest $request , $id)
    {
        $data = $this->allProductsService->store($request , $id) ; 
        if($data) 
        
                return $this->apiResponseStored(new ProductDetailsResource($data)) ; 
        
    }
}
