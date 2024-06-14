<?php

namespace App\Http\Service\UserProfile;

use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Http\Traits\Api\UploadMedia;
use App\Http\Requests\UserProfile\UploadImageRequest;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;

class UserProfileService
{
    use UploadMedia;

    public function update(EditProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();
        $user->update($data);
        return $user;
    }


    public function store(UploadImageRequest $request)
    { 
       $data = $request->validated() ;
       $user = auth()->user();
       if($data && $request->user()->id == $user->id) { 
         $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
         Storage::disk('public')->put($imageName, file_get_contents($request->image));
        $filePath =url('/storage/app/public/'.$imageName);
     $data['image']   =$filePath ;
         $record = $user->update($data);
        return $record;
     }
}
}
