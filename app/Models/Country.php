<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Country extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'id'
    ];


    /**
     * Return descriptions for Country
     * @return HasMany
     */
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(CountryDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(CountryDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(CountryDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($country_id = null)
    {
        $query = self::orderByDesc('countries.id')->join('country_descriptions as ad', 'ad.country_id', 'countries.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['countries.created_at', 'ad.*']);

        if ($country_id)
        {
            if (is_array($country_id))
            {
                $query->whereIn('countries.id', $country_id);
            }
            else
            {
                $query->where('countries.id', $country_id);
            }
        }
        $query->select([
            'countries.id',
            'ad.name',
        ]);
        return $query;
    }

}
