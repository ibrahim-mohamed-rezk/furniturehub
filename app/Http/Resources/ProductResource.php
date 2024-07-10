<?php

namespace App\Http\Resources;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Resources\component\TagResource;
use App\Http\Resources\Home\CategoryResource;
use App\Http\Resources\component\ItemResource;
use App\Http\Resources\component\PhotoResource;
use App\Http\Resources\component\PointResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\component\SectionResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = app(Request::class)->user('sanctum') ?? null ;
        $favorite = null;
        if($user){
            $favorite = Favorite::where('user_id', $user->id)->where('product_id',$this->id)->first();
        }
        // dd($favorite);

        foreach($this->photos as $row){
            $photos [] = asset($row->image);
        }
        foreach($this->items as $row){
            $items[] = $row->details->name;
        }
        return [
            'id' => $this->id,
            'sku_code'=>$this->sku_code,
            'count'=>$this->count,
            'image'=>asset($this->image),
            'photos'=>$photos ?? [],
            'rate'=>(int) $this->rate,
            'is_fav'=>($favorite) ? true:false,
            'items' => $items ?? [],
            'points'=>PointResource::collection($this->points),
            'sections'=>SectionResource::collection($this->sections),
            'tags'=>TagResource::collection($this->tags),
            'view_count'=>(int)$this->viewCount(),
            'category'=>$this->category->details->title,
            'cost'=>(double)$this->price['price'],
            'shipping'=>$this->shipping,
            'cost_discount'=> $this->price['discount'],
            'price_before'=> (double)$this->price['price_before'],
            'percentage'=>100 - $this->price['percentage'],
            'symbol'=>$this->price['symbol'],
            'show_category'=>$this->show_category,
            'seller_id'=>$this->seller_id,
            'category_id'=>$this->category_id,
            'page_offer'=>$this->page_offer,
            'name'=>$this->name,
            'description'=>$this->description,
            'slug'=>$this->slug,
            'keywords'=>$this->keywords,
            'meta_description'=>$this->meta_description,
            'material'=>$this->material,
            'dimensions'=>$this->dimensions,
            'color'=>$this->color,
            'delivery'=>$this->delivery,
            'made_in'=>$this->made_in,
            'deleted_at'=>($this->deleted_at)?$this->deleted_at->format('F d, Y'):null,
            'created_at'=>($this->created_at)?$this->created_at->format('F d, Y'):null,
            'updated_at'=>($this->updated_at)?$this->updated_at->format('F d, Y'):null,
            // 'related_products' => ProductResource::collection($this->related_products()),

        ];
    }
}
