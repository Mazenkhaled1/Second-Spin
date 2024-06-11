<?php

namespace App\Http\Service\Donations;

use App\Models\Donations;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Donations\MakeDonationRequest;
use App\Models\Charity;
use Illuminate\Support\str;
use App\Models\User;

class MakeDonationService
{
        public function store(MakeDonationRequest $request , User $user, $id)
        { 
           $data = $request->validated() ;
           if($data) { 
             $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
             Storage::disk('public')->put($imageName, file_get_contents($request->image));
             $filePath =url('/public/storage/'.$imageName);
         $data['image']   =$filePath ;
             $data['user_id'] = $request->user()->id;
             $charity=Charity::find($id);
             $data['charity_id'] = $charity->id;
             $record = Donations::create($data) ; 
             return $record ;
         }
        }
}