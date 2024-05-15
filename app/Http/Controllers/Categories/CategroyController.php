<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Products\AllProductsResource;
use App\Models\Category;
use App\Models\Product;

class CategroyController extends Controller
{

    public function getAllUsedCategories() 
{

    $allCategories = Category::whereNot('name' , 'Recycle')->get() ;
    return $this->apiResponse(CategoryResource::collection($allCategories) , ' Used Categories retrieved successfully' , 200 ) ; 
}


    public function getAllRecycleCategory() 
{
    $recycle = Category::where('name' , 'Recycle')->get() ;
    return $this->apiResponse(CategoryResource::collection($recycle) , ' Recycle Category retrieved successfully' , 200 ) ; 

}

    public function products($categoryId) 
    {
        $data = Product::where('category_id' , $categoryId)->get() ; 
        return $this->apiResponse(AllProductsResource::collection($data) , 'Products retrieved successfully' , 200 ) ; 

    }

}
