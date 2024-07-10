<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'phone'=>$this->phone,
            'address_1'=>$this->address_1,
            'address_2'=>$this->address_2,
            'post_code'=>$this->post_code,
            'information'=>$this->information,
            'governorate_id'=>$this->governorate_id,
            'default_address'=>$this->default_address,
        ];
    }
}
