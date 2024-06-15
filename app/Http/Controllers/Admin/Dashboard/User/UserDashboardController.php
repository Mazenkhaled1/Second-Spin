<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;

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

}
