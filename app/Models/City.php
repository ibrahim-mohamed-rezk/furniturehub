<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class City extends Model
{
    use SoftDeletes;
    public $table = 'cities';

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
    public function details()
    {
        return $this->hasOne(CityDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId());
    }
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(CityDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(CityDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(CityDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($city_id = null)
    {
        $query = self::orderByDesc('cities.id')->join('city_descriptions as ad', 'ad.city_id', 'cities.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['cities.created_at', 'ad.*']);

        if ($city_id)
        {
            if (is_array($city_id))
            {
                $query->whereIn('cities.id', $city_id);
            }
            else
            {
                $query->where('cities.id', $city_id);
            }
        }
        $query->select([
            'cities.id',
            'ad.city_id',
            'ad.name',
        ]);
        return $query;
    }
}
