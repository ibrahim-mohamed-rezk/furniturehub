<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Request;
use App\Services\Currency\CurrencyService;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
            'image'=>asset($this->product->image),
            'title'=>$this->product->details->name,
            'count'=>$this->count,
            'total'=>round($this->total ) ,
            'symbol'=>$request->user()->getCurrencyName() ?? 'L.E',
            'rate'=>(int) $this->product->rate,

            
        ];
    }
}
