<?php

namespace App\Http\Resources\Home;

use App\Http\Resources\SubCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoyProductResource extends JsonResource
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
            'title'=>$this->title,
            'subcategories'=> SubCategoryResource::collection($this->models),
            'product_fourth'=>ProductResource::collection($this->product_fourth())

        ];
    }
}
