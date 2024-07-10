<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuantityImage extends Model
{
    public $timestamps = false;
    public $table = "quantity_images";
    protected $fillable = [
        'id','image','quantity_id'
    ];
}
