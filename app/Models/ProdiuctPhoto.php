<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProdiuctPhoto extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'photo','product_id'
    ];

}
