<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequestSocialMedia extends Model
{
    public $table = 'seller_request_social_medias';
    public $fillable = ['position','url','seller_request_id'];
    public $timestamps = false;
}
