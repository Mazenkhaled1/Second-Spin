<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'image'         => $this->image,
            'price'         => $this->price,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at ?? null,
            'story'         => $this->story ?? null,
            'location'      => $this->location,
            'location_details'    => $this->location_details,
            'category'      => $this->category->name,
        ];
    }
}