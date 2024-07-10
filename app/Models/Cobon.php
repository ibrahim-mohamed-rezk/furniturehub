<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code','type', 'status', 'discount', 'start_date', 'end_date',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'cobon_categories','cobon_id','category_id');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'cobon_products','cobon_id','product_id');
    }
}
