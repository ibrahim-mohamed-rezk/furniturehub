<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequestBranch extends Model
{
    public $table = 'seller_request_branches';
    public $fillable = ['name','seller_request_id'];
    public $timestamps = false;
}
