<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;


class CategroyController extends Controller
{

    public function getAllCategories() 
{

    $allCategories = Category::get() ; 
    return $this->apiResponse(CategoryResource::collection($allCategories) , 'Categories retrieved successfully' , 200 ) ; 
}

}
