<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliate extends Model
{
    use SoftDeletes;
    public $table = "affiliates";
    protected $fillable =[
        'name','email','governorate_id','phone','status'
    ];
    public function governorate()
    {
        return $this->belongsTo(Governorate::class)->withTrashed();
    }
    public function governorate_id($governorate_id = null)
    {
        $governorate_name = Governorate::withDescription()->where('governorates.id',$governorate_id)->value('name');
        return $governorate_name;
    }
}
