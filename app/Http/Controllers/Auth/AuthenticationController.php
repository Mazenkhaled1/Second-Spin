<?php

namespace App\Http\Controllers\Auth;
use App\Http\Traits\Api\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Http\Service\Authentication\AuthenticationService;


class AuthenticationController extends Controller
{

 protected $authenticationService;

    public function __construct( AuthenticationService $authenticationService)
    { 
        $this->authenticationService = $authenticationService ; 
    }
    public function register( RegisterRequest $registerRequest ,AuthenticationService $authenticationService  ) 

    {
       $data = $this->authenticationService->register($registerRequest) ;
        if($data) 
        {
            return $this->apiResponse($data , 'User Created Successfully' , 200) ;
        }
    }

    public function login( LoginRequest $loginRequest , AuthenticationService $authenticationService) 
    {   
        $data = $this->authenticationService->login($loginRequest) ; 
         if($data) 
         { 
            return $this->apiResponse($data, 'User Logged In Successfully' , 200 ) ; 
         }
         return $this->apiResponse([], 'User Not Found' , 401 ) ; 
    }

    public function logout( Request $request ) 
    {
    
        $data  = $request->user()->currentAccessToken()->delete() ; 
        return $this->apiResponse( 'User Logged Out Successfully' , 200) ;

    }



}
