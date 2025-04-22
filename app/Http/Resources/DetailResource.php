<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'transaction_id' => $this->transaction_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'sub_total' => $this->sub_total,
            'created_at' => $this->whenNotNull($this->created_at?->format('Y-m-d H:i:s')),
            'updated_at' => $this->whenNotNull($this->updated_at?->format('Y-m-d H:i:s')),
        ];
    }
}
