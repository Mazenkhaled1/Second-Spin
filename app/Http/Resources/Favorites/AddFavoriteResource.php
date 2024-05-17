<?php

namespace App\Http\Resources\Favorites;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddFavoriteResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'product_id'   => $this->product_id,
            'user_id'   => $this->user_id,
        ];
    }
}