<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class PhoneCode extends Model
{

    protected $fillable = [
        'phone'	,  'code','email'
    ];

}
