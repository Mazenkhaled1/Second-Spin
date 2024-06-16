<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
          /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'id'            => $this->id,
            'title'      => $this->product->title,
            'price'      => $this->product->price,
            'location'   => $this->product->location,
            'image'      => $this->product->image,
            'product_id' => $this->product->id,
            // 'user_id'    => $this->user_id 
        ] ;
    }
}
