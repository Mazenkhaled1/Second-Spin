<?php

namespace App\Http\Service\UserProfile;

use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Models\User;



class EditProfileService
{

    public function update(EditProfileRequest $request,$id)
    { 
        $data = $request->validated();
        $record = User::FindOrFail($id);
        $record->update($data);
        return $record;
    }

}