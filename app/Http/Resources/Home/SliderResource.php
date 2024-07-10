<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'color'=>$this->color,
            'link'=>$this->link,
            'title'=>$this->name,
            'description'=>$this->description,
            'image'=>asset($this->image)
        ];
    }
}
