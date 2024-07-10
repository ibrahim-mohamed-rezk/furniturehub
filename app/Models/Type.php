<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Type extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'id'
    ];


    /**
     * Return descriptions for Type
     * @return HasMany
     */
    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(TypeDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(TypeDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(TypeDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($type_id = null)
    {
        $query = self::orderByDesc('types.id')->join('type_descriptions as ad', 'ad.type_id', 'types.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['types.created_at', 'ad.*']);

        if ($type_id)
        {
            if (is_array($type_id))
            {
                $query->whereIn('types.id', $type_id);
            }
            else
            {
                $query->where('types.id', $type_id);
            }
        }
        $query->select([
            'types.*',
            'ad.name',
        ]);
        return $query;
    }
    public function articles(){
        return $this->hasMany(Article::class,'type_id');
    }
    
}
