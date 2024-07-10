<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class ProductSection extends Model
{
    //use soft delete
    public $timestamps = false;

    protected $fillable = [
        'product_id'
    ];

    public function details()
    {
        return $this->hasOne(ProductSectionDescription::class)->where('language_id', currentLanguage()['id']);
    }

    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(ProductSectionDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(ProductSectionDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(ProductSectionDescription::class)->where('language_id', currentLanguage()['id'])->first();
        return $data;
    }
}
