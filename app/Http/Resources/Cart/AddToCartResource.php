<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddToCartResource extends JsonResource
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
            'product_id'   => $this->product_id,
            'title'      => $this->product->title,
            'user_id'   => $this->user_id,
        ] ;
    }
}