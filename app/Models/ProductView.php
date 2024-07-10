<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductView extends Model
{

    protected $fillable = [
       'user_id','product_id'
    ];

}
