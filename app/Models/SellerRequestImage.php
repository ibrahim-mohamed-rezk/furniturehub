<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequestImage extends Model
{
    public $timestamps = false;

    public $table = "seller_request_images";

    protected $fillable = [
        'seller_request_id','image'
    ];

}
