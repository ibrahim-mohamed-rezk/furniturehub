<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class CurrencyDescription extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'name','language_id','currency_id'
    ];

}
