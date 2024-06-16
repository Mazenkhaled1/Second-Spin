<?php

namespace App\Http\Controllers\Admin\Dashboard\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryDashboardController extends Controller
{
    public Function index() 
    {
        $categories = Category::all() ;
        return view('Admin.category', compact('categories')) ;
    }

    public Function create() 
    {
        return view('Admin.addcategory') ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> ' required|min:3|max:255|string|',
            ]) ;
        
        Category::create([
            'name' => $request->name ,
        ]) ; 
        return redirect()->back()->with('success','New Category Added Successfully');
            

    }


    public function destroy(Category $category) 
    {
        $category->delete() ;
        return redirect('dashboard/category/')->with('deleted','Category has been deleted successfully') ; 
    }


}
