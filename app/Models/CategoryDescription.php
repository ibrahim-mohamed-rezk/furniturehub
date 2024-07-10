<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class CategoryDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'title','language_id','category_id'
    ];

}
