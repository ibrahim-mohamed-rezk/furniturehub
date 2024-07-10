<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Faq extends Model
{
    use SoftDeletes;
    public $table = "faqs";
    protected $fillable = ['id'];

    public function descriptions($language_id = null)
    {
        if ($language_id) {
            $data = $this->hasMany(FaqDescription::class)->where('language_id', $language_id)->first();
            if (!$data) {
                $data = $this->hasMany(FaqDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(FaqDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($faq_id = null)
    {
        $query = self::join('faq_descriptions as fd', 'fd.faq_id', 'faqs.id')
            ->where('fd.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['faqs.created_at', 'fd.*']);

        if ($faq_id) {
            if (is_array($faq_id)) {
                $query->whereIn('faqs.id', $faq_id);
            } else {
                $query->where('faqs.id', $faq_id);
            }
        }
        $query->select([
            'faqs.*',
            'fd.request',
            'fd.response',
        ]);
        return $query;
    }
}
