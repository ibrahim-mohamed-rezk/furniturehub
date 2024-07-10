<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerRequest extends Model
{
    use SoftDeletes;
    public $table = "seller_requests";
    protected $fillable = ['name','brand_name','city','email','website_link','social_media_page','phone','section','question'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class)->withTrashed();
    }

    public function normalImages()
    {
        return $this->hasMany(SellerRequestImage::class);
    }
}
