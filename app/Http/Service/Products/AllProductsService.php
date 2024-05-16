<?php

namespace App\Http\Service\Products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Products\ProductRequest;

class AllProductsService
{
    public function index() 
    {
       return  Product::status()->whereNot('category_id' , '1')->get() ; 
    }

    public function store(ProductRequest $request , $id)
    {
        $data = $request->validated() ; 
        $user = auth()->user() ;
        $data['user_id']  = $user->id  ; 
        $category = Category::find($id) ; 
        $data['category_id'] = $category->id ; 
        $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
        Storage::disk('public')->put($imageName, file_get_contents($request->image));
        $data['image']   = $imageName ;
        $data['price'] = $request->price + ($request->price * 0.12) ;
        $insertProduct = Product::create($data) ;
        return $insertProduct  ; 
    }

}
