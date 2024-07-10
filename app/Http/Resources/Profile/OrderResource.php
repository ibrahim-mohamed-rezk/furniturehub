<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'status'=>__("web.$this->status"),
            'total_order'=>$this->total_products,
            'total'=>$this->total,
            'total_delivery'=>$this->total_delivery,
            'cobon_discount'=>$this->cobon_discount,
            'offer_discount'=>$this->offer_discount,
            'symbol'=>$request->user()->getCurrencyName() ?? 'L.E',
            'tax_value'=>$this->tax_value,
            'created_at'=>$this->created_at->format('j F, Y'),
            'products'=>OrderProductResource::collection($this->products),
        ];
    }
}
