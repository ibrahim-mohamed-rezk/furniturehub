<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (int)$this->id,
            'phone' => $this->phone,
            'name' => $this->name,
            'email' => $this->email,
            'device_token' => $this->device_token,
            'currency_id'=>(int)$this->currency_id ?? 1,
            'gevernorate_id'=>(int)$this->gevernorate_id,
            'affiliate_id'=>(int)$this->affiliate_id,
            'affiliate'=>(int)$this->affiliate,
            'photo'=>asset($this->photo),
            'role'=>$this->role,
        ];
    }
}
