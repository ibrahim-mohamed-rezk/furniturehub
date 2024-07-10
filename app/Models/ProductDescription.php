<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'name','description','keywords','meta_description','language_id','product_id','material','dimensions','color','delivery','made_in','slug'
    ];

}
