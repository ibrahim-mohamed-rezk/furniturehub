<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class OrderPayment extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'payment_id','payment_log','order_id','payment_type'
    ];
    public function payment_log(){
        return json_decode($this->payment_log);
    }
}
