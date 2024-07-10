<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rate','comment','product_id','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
