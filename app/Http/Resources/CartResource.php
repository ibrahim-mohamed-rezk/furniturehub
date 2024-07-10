<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Favorite;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = app(Request::class)->user('sanctum')??null ;
        $favorite = null;
        if($user){
            $favorite = Favorite::where('user_id', $user->id)->where('product_id',$this->product->id)->first();
        }
        return [

            'cart_id'=>$this->id,
            'product_id'=>$this->product->id,
            'category_name'=>$this->product->category->details->title,
            'product_count'=>$this->count,
            'is_fav'=>($favorite) ? true:false,
            'product_title'=>$this->product->details->name,
            'product_image'=>$this->product->image_url,
            'product_price'=>$this->product->price['price'],
            'symbol'=>$this->product->price['symbol'],

        ];
    }
}


