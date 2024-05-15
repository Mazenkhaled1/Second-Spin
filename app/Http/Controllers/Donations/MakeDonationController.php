<?php

namespace App\Http\Controllers\Donations;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Service\Donations\MakeDonationService;
use App\Http\Requests\Donations\MakeDonationRequest;
class MakeDonationController extends Controller
{
    protected $makeDonationService;
    public function __construct(MakeDonationService $makeDonationService)
    {
        $this->makeDonationService = $makeDonationService;

    }

    public function store(MakeDonationRequest $request , User $user, $id)
    {
        $record = $this->makeDonationService->store($request , $user,$id);
        if($record){
            return $this->apiResponseStored($record); // we need to make resourec 
        }
            return $this->apiResponse([] ,'not found ' , 403) ; 
     
    }
    }
