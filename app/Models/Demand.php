<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = [
        'name','phone','address','size','twoD','threeD','file','cost_status','date','governorate_id'
    ];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class)->withTrashed();
    }
    public function extensionImages()
    {
        return $this->hasMany(DemandImage::class)->where('status','extension');
    }
    public function normalImages()
    {
        return $this->hasMany(DemandImage::class)->where('status','image');
    }

}
