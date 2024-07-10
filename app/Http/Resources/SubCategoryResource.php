<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'image'=>asset($this->image) ?? null,
            'banner'=>asset($this->banner) ?? null,
            'title'=>$this->details->title,
            'deleted_at'=>($this->deleted_at)?$this->deleted_at->format('F d, Y'): null,
            'created_at'=>($this->created_at)?$this->created_at->format('F d, Y'): null,
            'updated_at'=>($this->updated_at)?$this->updated_at->format('F d, Y'): null,
        ];
    }
}
