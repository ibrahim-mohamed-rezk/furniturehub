<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamDescription extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name','job','language_id','team_id'
    ];  
}
