<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductPointDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'key','value','language_id','product_point_id'
    ];

}
