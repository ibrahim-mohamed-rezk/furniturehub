<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductPhoto extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'product_id','image'
    ];

    public function getImageUrlAttribute()
    {
        $image = asset($this->image);
        return $image;
    }
}
