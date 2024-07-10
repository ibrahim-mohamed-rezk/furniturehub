<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDescription extends Model
{
    public $timestamps = false;

    protected $fillable =[
        'id','name','description','bank_id','language_id'
    ];
}
