<?php

namespace App\Http\Controllers\UserProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Http\Requests\UserProfile\FeedbackRequest;
use App\Http\Requests\UserProfile\UploadImageRequest;
use App\Http\Resources\UserProfile\EditProfileResource;
use App\Http\Resources\UserProfile\FeedbackResource;
use App\Http\Service\UserProfile\EditProfileService;
use App\Http\Service\UserProfile\UploadImageService;
use App\Models\FeedBack;
use App\Models\User;


class UserProfileController extends Controller
{
    protected $uploadImageService;
    protected $editProfileService;
     public function __construct(UploadImageService $uploadImageService,EditProfileService $editProfileService )
     {
         $this->uploadImageService = $uploadImageService;
         $this->editProfileService = $editProfileService;
 
     }
     public function UploadImage(UploadImageRequest $request , User $user)
     {
         $record = $this->uploadImageService->store($request , $user);
         if ($record) {
            return $this->apiResponseStored(($record));
         }
     }


     public function MakeFeedback(FeedbackRequest $request,User $user){
        $data = $request->validated() ;
        $user = auth()->user() ;
        $data['user_id']  = $user->id  ; 

        $data=FeedBack::create($data);
        if($data){
            return $this->apiResponseStored((new FeedbackResource($data)));
        }
     }

     public function EditProfile(EditProfileRequest $request, $id)
     {
            $record = $this->editProfileService->update($request, $id);
            if ($record) 
                 return $this->apiResponseUpdated((new EditProfileResource($record)));
             
     }


     public function destroy($id)
    {
            $record = User::FindOrFail($id);
            $record->delete();
            return $this->apiResponseDeleted() ;
             
    }
}
    
