<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqDescription extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'request','response','faq_id','language_id'
    ];
}
