<?php

namespace App\Http\Controllers\Donations;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Service\Donations\MakeDonationService;
use App\Http\Requests\Donations\MakeDonationRequest;
use App\Http\Resources\Donations\CharitiesResource;
use App\Http\Resources\Donations\DonationResource;
use App\Models\Charity;
use App\Models\Product;

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
            return $this->apiResponseStored(new DonationResource($record)); 
        }
            return $this->apiResponse([] ,'not found ' , 403) ; 
     
    }

    public function getCharities()
    {
        $charities = Charity::get() ;
        if($charities)
        return $this->apiResponse(CharitiesResource::collection($charities), 'Charities retrieved Successfully' , 200) ;
    }
    }
