<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','period','bank_id','percent'

    ];

    public function bank(){
        return $this->belongsTo(Bank::class,'bank_id');
    }
    
}
