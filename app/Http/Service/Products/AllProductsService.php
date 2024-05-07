<?php

namespace App\Http\Service\Products;

use App\Models\Product;

class AllProductsService
{
    public function index() 
    {
       return  Product::get()->where('status','accepting') ; 
    }
}
