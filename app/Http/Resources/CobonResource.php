<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CobonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code'=>$this->code,
            'type'=>$this->type,
            'status'=>$this->status,
            'discount'=>$this->discount,
            'end_time'=>Carbon::parse($this->end_date)->format('Y-m-d H:i:s'),
        ];
    }
}
