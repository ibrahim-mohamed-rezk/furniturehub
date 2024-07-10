<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class PageDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'title','language_id','page_id','slug','keywords','meta_description','description'
    ];

}
