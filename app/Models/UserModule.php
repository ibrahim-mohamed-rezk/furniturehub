<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModule extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id','module_id'];
}
