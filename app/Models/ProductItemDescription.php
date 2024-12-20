<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductItemDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'name','language_id','product_item_id'
    ];

}
