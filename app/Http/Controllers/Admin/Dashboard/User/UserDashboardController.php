<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public Function index() 
    {
        $users = User::all() ;
        return view('Admin.user' , compact('users')) ; 
    }

    public function destroy(User $user) 
    {
        
        $user->delete() ;
        return redirect('dashboard/user/')->with('deleted','user has been deleted successfully') ; 
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::search($search)->get();

        return view('admin.user', compact('users'));
    }

}
