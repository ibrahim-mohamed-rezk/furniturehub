<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleDescription extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title','image', 'image_two', 'image_logo', 'user_image', 'user', 'slug', 'meta_description', 'keywords', 'description', 'article_id', 'language_id',
    ];
}
