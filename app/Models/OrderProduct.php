<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class OrderProduct extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'count','total','product_id','order_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

}
