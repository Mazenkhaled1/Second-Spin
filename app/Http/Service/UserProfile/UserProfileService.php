<?php

namespace App\Http\Service\UserProfile;

use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Http\Traits\Api\UploadMedia;
use App\Http\Requests\UserProfile\UploadImageRequest;
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
        $data = $request->validated();
        $user = auth()->user();
  dd($user) ;
        if (isset($data['image'])) {
            $data['image'] = $this->updateMedia($data['image'], 'images', $user->image);
        }
        $record = $user->update($data);
        return $record;
    }
}
