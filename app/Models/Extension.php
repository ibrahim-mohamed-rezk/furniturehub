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

class Extension extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','image','value','value_discount'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}