<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Currency extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'symbol','value'
    ];


    /**
     * Return descriptions for Currency
     * @return HasMany
     */
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(CurrencyDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(CurrencyDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(CurrencyDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($currency_id = null)
    {
        $query = self::join('currency_descriptions as ad', 'ad.currency_id', 'currencies.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['currencies.created_at', 'ad.*']);

        if ($currency_id)
        {
            if (is_array($currency_id))
            {
                $query->whereIn('currencies.id', $currency_id);
            }
            else
            {
                $query->where('currencies.id', $currency_id);
            }
        }
        $query->select([
            'currencies.*',
            'ad.name',
        ]);
        return $query;
    }

}
