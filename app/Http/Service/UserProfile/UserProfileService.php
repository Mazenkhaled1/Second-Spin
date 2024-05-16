<?php

namespace App\Http\Service\UserProfile;

use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Models\User;
use App\Http\Requests\UserProfile\UploadImageRequest;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;




class UserProfileService
{

    public function update(EditProfileRequest $request,$id)
    { 
        // dd($request->name) ;
        $user = auth()->user()->id; 
        $data = $request->validated();
        $record = User::FindOrFail($id);
        if($user == $request->id)
        {
            $record->update($data); 
        }
        return $record;
    }

    public function store(UploadImageRequest $request )
{ 
     $data = $request->validated() ;
     $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
      Storage::disk('public')->put($imageName, file_get_contents($request->image));
     $data['image'] = $imageName ;
     $record = User::create($data) ;
     return $record ;
 
}

}





