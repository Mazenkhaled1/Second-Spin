<?php

namespace App\Http\Service\Authentication;

use App\Models\User;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Authentication\RegisterRequest;
use GuzzleHttp\Psr7\Request;

class AuthenticationService
{
     public function register(RegisterRequest $registerRequest) 
      
     {
          $data = $registerRequest->validated() ; 
          $new_user = User::create($data) ; 
          $data['token']= $new_user->createToken('ApiToken')->plainTextToken ;
          $data['name']= $new_user->name ;
          $data['email']= $new_user->email ;
        return $data ; 
     }


     public function login(LoginRequest $loginRequest) 
      
     {
          if(Auth::attempt( [ 'email' => $loginRequest->email , 'password' => $loginRequest->password]))
         {
            $user = Auth::user() ;
            $data['token']= $user->createToken('ApiToken')->plainTextToken ;
            $data['name']= $user->name ;
            $data['email']= $user->email ;
         } 
         return $data ; 
     }

    
}