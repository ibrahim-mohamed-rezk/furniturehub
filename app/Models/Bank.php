<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Bank extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'id','image'
    ];
    public function periods()
    {
        return $this->hasMany(Period::class, 'bank_id');
    }
    public function descriptions($language_id = null)
    {
        if ($language_id) {
            $data = $this->hasMany(BankDescription::class)->where('language_id', $language_id)->first();
            if (!$data) {
                $data = $this->hasMany(BankDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(BankDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($bank_id = null)
    {
        $query = self::orderByDesc('banks.id')->join('bank_descriptions as bd', 'ad.bank_id', 'banks.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['banks.created_at', 'ad.*']);

        if ($bank_id) {
            if (is_array($bank_id)) {
                $query->whereIn('banks.id', $bank_id);
            } else {
                $query->where('banks.id', $bank_id);
            }
        }
        $query->select([
            'banks.*',
            'bd.name',
            'bd.description',
        ]);
        return $query;
    }
}
