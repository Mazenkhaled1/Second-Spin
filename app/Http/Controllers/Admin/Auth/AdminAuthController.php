<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;


class AdminAuthController extends Controller
{
    public function login(Request $request) 
      
    {
        $request->validate([
            'email'=> 'required|email' ,
            'password'=> ['required' ,  password::min(8)->mixedCase()->numbers()->symbols()] 
            ]) ;
            
            if(Auth::guard('admin')->attempt( [ 'email' => $request->email , 'password' => $request->password]))
        {
            dd(2) ;
            return redirect()->intended('home');
          
        } 
        return redirect('login')->withErrors('Username or Password not correct');
         
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}