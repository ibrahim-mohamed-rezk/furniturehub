<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductSectionDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'key','value','language_id','product_section_id'
    ];

}
