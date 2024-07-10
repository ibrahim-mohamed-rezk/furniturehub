<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'image', 'banner', 'slug'
    ];

    public function getImageUrlAttribute()
    {
        $image = asset($this->image);
        return $image;
    }
    public function getTitleOfCategoryById($categoryId)
    {
        // Retrieve the title of the category based on the given ID
        $categoryTitle = Category::where('categories.id', $categoryId)
            ->join('category_descriptions as ad', 'ad.category_id', 'categories.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->pluck('ad.title')
            ->first();

        return $categoryTitle;
    }

    public function details()
    {
        return $this->hasOne(CategoryDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId());
    }
    public function models()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
    public function product_fourth()
    {
        // Define a unique cache key based on the method and its parameters
        $cacheKey = LaravelLocalization::getCurrentLocale().'product_fourth_' . $this->id;

        // Attempt to retrieve the result from the cache
        $cachedResult = cache($cacheKey);

        if ($cachedResult) {
            return $cachedResult;
        }

        // If not in the cache, proceed with the original logic
        $ids = Category::where('category_id', $this->id)->pluck('id')->toArray();
        array_push($ids, $this->id);

        if (count($ids) == 0) {
            $ids = ['0'];
        }

        $products =  Product::withDescription()
            ->whereIn('category_id', $ids)->where('only_offer','no')
            ->with([
                'photos',
                'items.details',
                'points.details',
                'sections.details',
                'tags.details',
                'category.details',
            ])->latest()
            ->take(4)
            ->get();

        // Cache the result for a certain duration (adjust as needed)
        cache()->put($cacheKey, $products, now()->addMinutes(60)); // Cache for 60 minutes

        return $products;
    }


    /**
     * Return descriptions for Category
     * @return HasMany
     */
    public function descriptions($language_id = null)
    {
        if ($language_id) {
            $data = $this->hasMany(CategoryDescription::class)->where('language_id', $language_id)->first();
            if (!$data) {
                $data = $this->hasMany(CategoryDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(CategoryDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($category_id = null)
    {
        $query = self::join('category_descriptions as ad', 'ad.category_id', 'categories.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['categories.created_at', 'ad.*']);

        if ($category_id) {
            if (is_array($category_id)) {
                $query->whereIn('categories.id', $category_id);
                $orderedIds = implode(',', $category_id);
                $query->orderByRaw("FIELD(categories.id, $orderedIds)");
            } else {
                $query->where('categories.id', $category_id);
            }
        }
        $query->select([
            'categories.*',
            'ad.title',
        ]);
        return $query;
    }
    public function getTitleOfMainCategoryById($categoryId)
    {
        // Retrieve the title of the category based on the given ID
        $categoryTitle = Category::where('categories.id', $categoryId)
            ->join('category_descriptions as ad', 'ad.category_id', 'categories.category_id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->pluck('ad.title')
            ->first();

        return $categoryTitle;
    }
}
