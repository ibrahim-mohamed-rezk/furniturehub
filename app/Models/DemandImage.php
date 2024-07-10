<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class DemandImage extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'demand_id','image','status'
    ];

}
