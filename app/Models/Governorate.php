<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Governorate extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'delivery_cost'
    ];
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Return descriptions for Country
     * @return HasMany
     */
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(GovernorateDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(GovernorateDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(GovernorateDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($governorate_id = null)
    {
        $query = self::orderByDesc('governorates.id')->join('governorate_descriptions as ad', 'ad.governorate_id', 'governorates.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['governorates.created_at', 'ad.*']);

        if ($governorate_id)
        {
            if (is_array($governorate_id))
            {
                $query->whereIn('governorates.id', $governorate_id);
            }
            else
            {
                $query->where('governorates.id', $governorate_id);
            }
        }
        $query->select([
            'governorates.id',
            'governorates.delivery_cost',
            'ad.governorate_id',
            'ad.name',
        ]);
        return $query;
    }

}
