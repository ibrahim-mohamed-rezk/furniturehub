<?php

namespace App\Http\Resources\component;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'key'=>$this->details->key,
            'value'=>$this->details->value,
        ];
    }
}
