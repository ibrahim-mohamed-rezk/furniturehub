<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductTagDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'name','description','language_id','product_tag_id'
    ];

}
