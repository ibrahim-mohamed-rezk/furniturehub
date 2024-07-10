<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateSystem extends Model
{
    use SoftDeletes;
    public $table = 'affiliate_system';
    protected $fillable =['user_id','affiliate_code','affiliate_count_user','affiliate_count_order'];
    public function user()
    {
        return $this->hasOne(User::class,'user_id');
    }
}
