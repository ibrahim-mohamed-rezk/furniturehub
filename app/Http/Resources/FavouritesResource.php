<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\component\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouritesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->product->id,
            'sku_code'=>$this->product->sku_code,
            'count'=>$this->product->count,
            'image'=>asset($this->product->image),
            'category'=>$this->product->category->details->title,
            'cost'=>$this->product->price['price'],
            'cost_discount'=>$this->product->price['discount'],
            'symbol'=>$this->product->price['symbol'],
            'category_id'=>$this->product->category_id,
            'name'=>$this->product->details->name,
        ];
    }
}
