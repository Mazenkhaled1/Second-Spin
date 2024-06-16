<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductDashboardController extends Controller
{
   
    public function productsPendingOrRejecting()
    {
    $productPendings = Product::where('status' , 'pending')->get() ;
    return view('Admin.request_to_sell' , compact('productPendings'));
    }

    public function acceptingProducts($id) 
    { 
        $product = Product::find($id) ;
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if($product->status == 'pending' )
        {
            $product->update(['status' => 'accepting']);
            return redirect()->back()->with('success', 'Product status updated to accepting.');
        }

        return redirect()->back()->with('error', 'Product status is not pending.');
    }

    
    public function rejectingProducts($id) 
    { 
        $product = Product::find($id) ;
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if($product->status == 'pending' )
        {
            $product->update(['status' => 'rejecting']);
            return redirect()->back()->with('success', 'Product status updated to rejecting.');
        }

        return redirect()->back()->with('error', 'Product status is not pending.');

    }

    
    public function productsAccepting()
    {
    $productAccepted = Product::where('status' , 'accepting')->get() ;
    return view('Admin.product' , compact('productAccepted')) ;
    
    }

    public function destroy(Product $product) 
    {

        $product->delete() ;
        return redirect('dashboard/product/')->with('deleted','Product has been deleted successfully') ; 
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $productAccepted = Product::search($search)->get();

        return view('admin.product', compact('productAccepted'));
    }
}
