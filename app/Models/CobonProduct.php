<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed id
 */
class CobonProduct extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'product_id','cobon_id'
    ];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
