<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed id
 */
class CobonCategory extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'category_id','cobon_id'
    ];

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
