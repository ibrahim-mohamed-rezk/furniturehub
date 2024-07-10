<?php

namespace App\Http\Resources\Home;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            $favorite = Favorite::where('user_id', $user->id)->where('product_id',$this->id)->first();
        }
        return [
            'id' => $this->id,
            'sku_code'=>$this->sku_code,
            'rate'=>(int) $this->rate,
            'count'=>$this->count,
            'is_fav'=>($favorite) ? true:false,
            'image'=>asset($this->image),
            'category'=>$this->category->details->title,
            'cost'=>(double)$this->price['price'],
            'view_count'=>(int)$this->viewCount(),
            'cost_discount'=>$this->price['discount'],
            'price_before'=>(double)$this->price['price_before'],
            'percentage'=>100 - $this->price['percentage'],
            'symbol'=>$this->price['symbol'],
            'category_id'=>$this->category_id,
            'name'=>$this->name,

        ];
    }
}
