<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\Api\ApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use GuzzleHttp\Psr7\Request;

class AuthenticationController extends Controller
{
    public function register( RegisterRequest $registerRequest) 

    {
        $data = $registerRequest->validated() ;  // contains all the 3 keys after the validation 
        $new_user = User::create($data) ; 
        $data['token']= $new_user->createToken('ApiToken')->plainTextToken ;
        $data['name']= $new_user->name ;
        $data['email']= $new_user->email ;

        if($data) 
        {
            return  $this->ApiResponse($data , 'User Created Successfully' , 200 ) ;
        }
    }

    public function login( LoginRequest $loginRequest) 
    {
         if(Auth::attempt( [ 'email' => $loginRequest->email , 'password' => $loginRequest->password]))
         {
            $user = Auth::user() ;
            $data['token']= $user->createToken('ApiToken')->plainTextToken ;
            $data['name']= $user->name ;
            $data['email']= $user->email ;
         }
         if($data) 
         { 
            return $this->apiResponse($data, 'User Logged In Successfully' , 200 ) ; 
         }
    }

    public function logout( Request $request) 
    {
        $data  = $request->user()->currentAccessToken()->delete() ; 
        return $this->apiResponse($data , 'User Logged Out Successfully' , 200) ;

    }

}
