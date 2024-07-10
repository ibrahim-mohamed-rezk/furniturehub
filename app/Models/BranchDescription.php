<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchDescription extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'address', 'work_time', 'branch_id', 'language_id',
    ];
}
