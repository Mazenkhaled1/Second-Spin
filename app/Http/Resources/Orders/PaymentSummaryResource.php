<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class paymentSummaryResource extends JsonResource
{
        /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'total'         => $this->total,
            'delivery_fees' => $this->delivery_fees,
            'total_price'   => $this->total_price,
        ];
    }
}