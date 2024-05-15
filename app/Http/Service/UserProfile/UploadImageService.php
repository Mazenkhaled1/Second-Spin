<?php

namespace App\Http\Service\UserProfile;

use App\Http\Requests\UserProfile\UploadImageRequest;
use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;


class UploadImageService
{

    public function store(UploadImageRequest $request , User $user)
    { 
         $data = $request->validated() ;
         $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
         Storage::disk('public')->put($imageName, file_get_contents($request->image));
         $data['image'] = $imageName ;
        //  $data['user_id'] = $request->user()->id;
         $record = User::create($data) ;
         return $record ;
     
    }

}