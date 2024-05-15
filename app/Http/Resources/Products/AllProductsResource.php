<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllProductsResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            
            'id'          => $this->id,
            'title'       => $this->title,
            'image'       => $this->image,
            'price'       => $this->price,
            'location'    => $this->location,
        ];
    }
}

