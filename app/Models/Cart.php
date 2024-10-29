<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Cart extends Model
{
    protected $fillable = [
        'count'	,'user_id'	,'product_id'
    ];

    public function scopewithAttr($query)
    {
        return $query->with(['product']);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function extensions()
    {
        return $this->belongsToMany(Extension::class, 'cart_item_extensions', 'cart_id', 'extension_id');
    }

}
