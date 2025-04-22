<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'total_price' => $this->total_price,
            'created_at' => $this->whenNotNull($this->created_at?->toDateTimeString()),
            'updated_at' => $this->whenNotNull($this->updated_at?->toDateTimeString()),
            'details' => DetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
