<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductTag extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'product_id','image'
    ];

    public function details()
    {
        return $this->hasOne(ProductTagDescription::class)->where('language_id', currentLanguage()['id']);
    }

    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(ProductTagDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(ProductTagDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(ProductTagDescription::class)->where('language_id', currentLanguage()['id'])->first();
        return $data;
    }
}
