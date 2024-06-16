<?php

namespace App\Http\Controllers\Admin\Dashboard\Charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Charity;

class CharityDashboardController extends Controller
{
    public Function index() 
    {
        $charities = Charity::all() ;
        return view('Admin.charity', compact('charities')) ;
    }

    public Function create() 
    {
        return view('Admin.addcharity') ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> ' required|min:3|max:255|string|',
            ]) ;
        
        Charity::create([
            'name' => $request->name ,
        ]) ; 
        return redirect()->back()->with('success','New Charity Added Successfully');
            

    }


    public function destroy(Charity $charity) 
    {
        $charity->delete() ;
        return redirect('dashboard/charity/')->with('deleted','Charity has been deleted successfully') ; 
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $charities = Charity::search($search)->get();

        return view('admin.charity', compact('charities'));
    }


}
