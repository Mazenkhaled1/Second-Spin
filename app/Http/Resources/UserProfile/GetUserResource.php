<?php

namespace App\Http\Resources\UserProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserResource extends JsonResource
{
        /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            
            'id'       => $this->id,
            'name'     => $this->name,
            'email'    => $this->email,
            'image'    => $this->image,
            
        ];
    }
}