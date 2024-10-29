<?php

namespace App\Models;

use App\Services\Currency\CurrencyService;
use App\Services\Product\Favorite\FavoriteService;
use App\Services\Product\Rate\RateService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Product extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'sku_code', 'count', 'image', 'cost', 'seller_id', 'category_id', 'admin_id', 'cost_discount', 'admin_update_id', 'page_offer', 'only_offer', 'type'
    ];
    protected $with = ['photos', 'items', 'sections', 'tags', 'points'];

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
    public function items()
    {
        return $this->hasMany(ProductItem::class);
    }
    public function extensions()
    {
        return $this->belongsToMany(Extension::class, 'product_extensions');
    }

    public function sections()
    {
        return $this->hasMany(ProductSection::class);
    }
    public function tags()
    {
        return $this->hasMany(ProductTag::class);
    }
    public function points()
    {
        return $this->hasMany(ProductPoint::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function getPriceAttribute()
    {
        // Define a unique cache key based on the method and its parameters
        $cacheKey = 'price_attribute_' . $this->id;

        // Attempt to retrieve the result from the cache
        $cachedResult = cache($cacheKey);

        if ($cachedResult) {
            return $cachedResult;
        }

        // If not in the cache, proceed with the original logic
        $result = [
            'price' => round($this->cost , 2),
            'price_before' => null,
            'percentage' => 100,
            'discount' => false,
            'symbol' => 'L.E',
        ];

        if ($this->cost_discount) {
            $result = [
                'price' => round($this->cost_discount , 2),
                'price_before' => round($this->cost , 2),
                'percentage' => round(($this->cost_discount / $this->cost) * 100, 0),
                'discount' => true,
                'symbol' => 'L.E',
            ];
        }

        // Cache the result for a certain duration (adjust as needed)
        cache()->put($cacheKey, $result, null); // Cache for 60 minutes

        return $result;
    }
    public function getPercentageAttribute(){
        return round(($this->cost_discount / $this->cost) * 100, 0);
    }

    public function getRateAttribute()
    {
        $rates = new RateService();
        $rate = $rates->getRate($this);
        return $rate['rate'];
    }
    public function viewCount()
    {
        $count = ProductView::where('product_id', $this->id)->count();
        return $count;
    }
    public function getRatesAttribute()
    {
        // Define a unique cache key based on the method and its parameters
        $cacheKey = 'rates_attribute_' . $this->id;

        // Attempt to retrieve the result from the cache
        $cachedResult = cache($cacheKey);

        if ($cachedResult) {
            return $cachedResult;
        }

        // If not in the cache, proceed with the original logic
        $rates = new RateService();
        $rate = $rates->getRate($this);
        $rate['rate_percentage'] = ($rate['rate'] / 5) * 100;

        for ($i = 5; $i > 0; $i--) {
            $rate['rating'][$i]['count'] = $rates->getRate($this, $i)['count'];
            $rate['rating'][$i]['percentage'] = round(($rates->getRate($this, $i)['count'] / ($rates->getRate($this)['count'] == 0 ? 1 : $rates->getRate($this)['count'])) * 100, 2);
        }

        // Cache the result for a certain duration (adjust as needed)
        cache()->put($cacheKey, $rate, null); // Cache for 60 minutes

        return $rate;
    }

    public function details()
    {
        return $this->hasOne(ProductDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId());
    }

    public function favorited()
    {
        $user = Auth::user();
        if ($user) {
            $favorite = new FavoriteService($this);
            return $favorite->checkFavorite();
        }
        return false;
    }

    public function getBoughtAttribute()
    {
        if ($this->count > 0) {
            $title = __('web.add_to_cart');
            $action = route('cart.store');
            $status = 'inStock';
        } else {
            $title = __('web.contact_us');
            $action = route('web.contact');
            $status = 'outStock';
        }
        return
            [
                'title' => $title,
                'action' => $action,
                'status' => $status,
            ];
    }

    public function getStockedAttribute()
    {
        $stock = $this->count > 0 ? __('web.in_stock') : __('web.out_stock');
        return $stock;
    }
    public function getUrlAttribute()
    {
        $category = str_replace(' ', '-', $this->category->details->title);
        $sku = $this->sku_code;
        $extension = $category . "/" . $sku . "/" . str_replace(' ', '-', $this->details->slug);
        $link = route('web.product_details', ['title' => $extension]);
        return $link;
    }

    public function getImageUrlAttribute()
    {
        $image = asset($this->image);
        if (str_contains($this->image, 'firebasestorage')) {
            $image = $this->image;
        }
        return $image;
    }

    /**
     * Return descriptions for Product
     * @return HasMany
     */
    public function descriptions($language_id = null)
    {
        if ($language_id) {
            $data = $this->hasMany(ProductDescription::class)->where('language_id', $language_id)->first();
            if (!$data) {
                $data = $this->hasMany(ProductDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(ProductDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($product_id = null)
    {
        $query = self::join('product_descriptions as ad', 'ad.product_id', 'products.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['products.created_at', 'ad.*']);

        if ($product_id) {
            if (is_array($product_id)) {
                $query->whereIn('products.id', $product_id);
            } else {
                $query->where('products.id', $product_id);
            }
        }
        $query->select([
            'products.*',
            'ad.name',
            'ad.description',
            'ad.slug',
            'ad.keywords',
            'ad.meta_description',
            'ad.material',
            'ad.dimensions',
            'ad.color',
            'ad.delivery',
            'ad.made_in',
        ]);
        return $query;
    }
    public static function withDescriptionApp($product_id = null)
    {

        $query = self::join('product_descriptions as ad_current', 'ad_current.product_id', 'products.id')
            ->where('ad_current.language_id', LaravelLocalization::getCurrentLocaleId())
            ->leftJoin('product_descriptions as ad_english', function ($join) {
                $join->on('ad_english.product_id', '=', 'products.id')
                    ->where('ad_english.language_id', ReverseLanguage()->id);
            });

        $query->select([
            'products.*',
            'ad_current.name as current_name',
            'ad_current.description as current_description',
            'ad_english.name as english_name',
            'ad_english.description as english_description',
            'ad_current.slug',
            'ad_current.keywords',
            'ad_current.meta_description',
            'ad_current.material',
            'ad_current.dimensions',
            'ad_current.color',
            'ad_current.delivery',
            'ad_current.made_in',
        ]);

        if ($product_id) {
            if (is_array($product_id)) {
                $query->whereIn('products.id', $product_id);
            } else {
                $query->where('products.id', $product_id);
            }
        }

        return $query;
    }
    public function calculate_cobon($discount)
    {

        return $this->price['price'] * (1 - ($discount / 100));
    }
}
