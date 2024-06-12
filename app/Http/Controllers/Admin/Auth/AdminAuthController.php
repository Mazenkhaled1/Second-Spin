<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    public function login(LoginRequest $loginRequest) 
      
    {
         if(Auth::guard('admin')->attempt( [ 'email' => $loginRequest->email , 'password' => $loginRequest->password]))
        {
            return redirect()->intended('dashboard');
          
        } 
        return redirect('login')->withErrors('Username or Password not correct');
         
    }
}