<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Page extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'image'
    ];


    /**
     * Return descriptions for Country
     * @return HasMany
     */
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(PageDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(PageDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(PageDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($page_id = null)
    {
        $query = self::orderByDesc('pages.id')->join('page_descriptions as ad', 'ad.Page_id', 'pages.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['pages.*', 'ad.*']);

        if ($page_id)
        {
            if (is_array($page_id))
            {
                $query->whereIn('pages.id', $page_id);
            }
            else
            {
                $query->where('pages.id', $page_id);
            }
        }
        $query->select([
            'pages.id',
            'pages.image',
            'ad.title',
            'ad.slug',
            'ad.meta_description',
            'ad.keywords',
            'ad.description',
        ]);
        return $query;
    }

}
