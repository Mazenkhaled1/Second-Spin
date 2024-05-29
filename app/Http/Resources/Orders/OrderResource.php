<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'payment_method'   => $this->payment_method,
            'location'      => $this->location,
            'location_details'      => $this->location_details,
            'total'      => $this->total,
            'delivery_fees'      => $this->delivery_fees,
            'total_price'      => $this->total_price,
            'user_id'   => $this->user_id,
        ];
    }
}