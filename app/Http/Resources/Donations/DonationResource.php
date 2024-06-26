<?php

namespace App\Http\Resources\Donations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'description'   => $this->description,
            'title'       => $this->title,
            'image'       => $this->image,
            'location'    => $this->location,
            'location_details'    => $this->location_details,
        ];
    }
}