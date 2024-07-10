<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductOffer extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'offer_id','product_id'
    ];

}
