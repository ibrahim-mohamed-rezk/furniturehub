<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Slider extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status', 'link', 'color', 'image'
    ];
    public function getImageUrlAttribute()
    {
        $image = asset($this->withDescription()->value('ad.image'));
        return $image;
    }
    public function descriptions()
    {
        return $this->hasMany(SliderDescription::class, 'slider_id');
    }

    public static function withDescription($slider_id = null)
    {
        $query = self::join('slider_descriptions as ad', 'ad.slider_id', 'sliders.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId());

        if ($slider_id) {
            $query->when(is_array($slider_id), function ($q) use ($slider_id) {
                $q->whereIn('sliders.id', $slider_id);
            }, function ($q) use ($slider_id) {
                $q->where('sliders.id', $slider_id);
            });
        }

        $query->select([
            'sliders.created_at',
            'sliders.link',
            'ad.image',
            'ad.*'
        ]);

        // Eager load the descriptions
        $query->with('descriptions');

        return $query;
    }
}
