<?php

namespace App\Http\Controllers\Admin\Dashboard;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminDashboardController extends Controller
{
    public Function index() 
    {
        $admins = Admin::all() ;
        return view('Admin.admin', compact('admins')) ;
    }

    public Function create() 
    {
        return view('Admin.create') ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> ' required|min:3|max:255|string|',
            'email'=> 'required|unique:admins,email', 
            'password' => 'required',
            ]) ;
        
        Admin::create([
            'name' => $request->name ,
            'email' => $request->email , 
            'password' => $request->password
        ]) ; 
        return redirect()->back()->with('success','New Admin Added Successfully');
            

    }


    public function destroy(Admin $admin) 
    {
        $admin->delete() ;
        return redirect('dashboard/')->with('deleted','Admin has been deleted successfully') ; 
    }


}
