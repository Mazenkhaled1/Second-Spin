<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductDashboardController extends Controller
{
    public function productsAccepting()
    {
    $productAccepted = Product::where('status' , 'accepting')->get() ;
    return view('Admin.product' , compact('productAccepted')) ;
    
    }
    public function productsPendingOrRejecting()
    {
    $productPendings = Product::where('status' , 'pending')->orWhere('status' , 'rejecting')->get() ;
    return view('Admin.request_to_sell' , compact('productPendings'));
    }

    public function acceptingProducts($id) 
    { 
        $product = Product::find($id) ;
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if($product->status == 'pending' ||$product->status == 'rejecting' )
        {
          $product->update(['status' , 'accepting']) ;
            return redirect()->back()->with('success', 'Product status updated to accepting.');
        }

        return redirect()->back()->with('error', 'Product status is not pending or rejecting.');

    }



}
