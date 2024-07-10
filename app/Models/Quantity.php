<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quantity extends Model
{
    use SoftDeletes;
    public $table = "quantities";
    protected $fillable = [
        'id','name','phone','notes','business_activity'
    ];
    public function normalImages()
    {
        return $this->hasMany(QuantityImage::class);
    }

}
