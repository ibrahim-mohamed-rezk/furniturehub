<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',  'type_id', 'user_id','slug_title'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id')
            ->join('type_descriptions AS td', 'types.id', 'td.type_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'types.*']);
    }

    public function getUrlAttribute()
    {
        $extension = $this->id .'/'.str_replace(' ', '-', $this->details->slug);
        $link = route('web.blog_details',$extension);
        return $link;
    }

    public function details()
    {
        return $this->hasOne(ArticleDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId());
    }
    public function descriptions($language_id = null)
    {
        if ($language_id) {
            $data = $this->hasMany(ArticleDescription::class)->where('language_id', $language_id)->first();
            if (!$data) {
                $data = $this->hasMany(ArticleDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(ArticleDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($article_id = null)
    {
        $query = self::orderByDesc('articles.id')->join('article_descriptions as ad', 'ad.article_id', 'articles.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['articles.created_at', 'ad.*']);

        if ($article_id) {
            if (is_array($article_id)) {
                $query->whereIn('articles.id', $article_id);
            } else {
                $query->where('articles.id', $article_id);
            }
        }
        $query->select([
            'articles.*',
            'ad.title',
            'ad.user',
            'ad.slug',
            'ad.meta_description',
            'ad.description',
            'ad.keywords',
            'ad.image',
            'ad.image_logo',
            'ad.image_two',
            'ad.user_image',
        ]);
        return $query;
    }
}
