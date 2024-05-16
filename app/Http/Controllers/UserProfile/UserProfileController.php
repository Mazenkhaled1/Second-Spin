<?php

namespace App\Http\Controllers\UserProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile\EditProfileRequest;
use App\Http\Requests\UserProfile\FeedbackRequest;
use App\Http\Requests\UserProfile\UploadImageRequest;
use App\Http\Resources\UserProfile\EditProfileResource;
use App\Http\Resources\UserProfile\FeedbackResource;
use App\Http\Service\UserProfile\UserProfileService;
use App\Models\FeedBack;
use App\Models\User;


class UserProfileController extends Controller
{
    protected $userProfileService;
     public function __construct(UserProfileService $userProfileService)
     {
         $this->userProfileService = $userProfileService;
 
     }
     public function UploadImage(UploadImageRequest $request , User $user)
     {
         $record = $this->userProfileService->store($request , $user);
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
            $record = $this->userProfileService->update($request, $id);
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
    
