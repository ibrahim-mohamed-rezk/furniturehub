<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name','last_name','phone','address_1','address_2','post_code','information','governorate_id','user_id','default_address'
    ];
    public function governorate($governorate_id = null)
    {
        $governorate_name = Governorate::withDescription()->where('governorates.id',$governorate_id)->value('name');
        return $governorate_name;
    }
}
