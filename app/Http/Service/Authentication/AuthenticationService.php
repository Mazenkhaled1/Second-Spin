<?php

namespace App\Http\Service\Authentication;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;


class AuthenticationService
{
     public function register(RegisterRequest $registerRequest) 
      
     {
          $data = $registerRequest->validated() ;  // contains all the 3 keys after the validation 
          $new_user = User::create($data) ; 
          $data['token']= $new_user->createToken('ApiToken')->plainTextToken ;
          $data['name']= $new_user->name ;
          $data['email']= $new_user->email ;
     }


     public function login(LoginRequest   $loginRequest) 
      
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