<?php

namespace App\Http\Resources\Favorites;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteListResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'title'      => $this->product->title,
            'price'      => $this->product->price,
            'location'      => $this->product->location,
            'image'      => $this->product->image,
             'product_id'      => $this->product->id,
        ];
    }
}