<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'token',
        'status',
        'total',
        'total_products',
        'total_delivery',
        'cobon_discount',
        'offer_discount',
        'tax_value',
        'cobon_id',
        'offer_id',
        'seller_id',
        'user_id',
        'affiliate_profit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class)->withTrashed();
    }
    public function cobon()
    {
        return $this->belongsTo(Cobon::class)->withTrashed();
    }
    public function payment()
    {
        return $this->hasOne(OrderPayment::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

}
