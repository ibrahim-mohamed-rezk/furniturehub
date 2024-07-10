<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Notification extends Model
{
    //use soft delete
    use SoftDeletes;

    protected $fillable = [
        'status','target_id','user_id'
    ];

    public function descriptions($language_id= null)
    {
        if ($language_id) {
            $data = $this->hasMany(NotificationDescription::class)->where('language_id', $language_id)->first();
            if(!$data){
                $data = $this->hasMany(NotificationDescription::class)->first();
            }
            return $data;
        }
        $data = $this->hasMany(NotificationDescription::class)->where('language_id', LaravelLocalization::getCurrentLocaleId())->first();
        return $data;
    }
    public static function withDescription($notification_id = null)
    {
        $query = self::orderByDesc('notifications.id')->join('notification_descriptions as ad', 'ad.notification_id', 'notifications.id')
            ->where('ad.language_id', LaravelLocalization::getCurrentLocaleId())
            ->select(['notifications.*', 'ad.*']);

        if ($notification_id)
        {
            if (is_array($notification_id))
            {
                $query->whereIn('notifications.id', $notification_id);
            }
            else
            {
                $query->where('notifications.id', $notification_id);
            }
        }
        $query->select([
            'notifications.id',
            'notifications.status',
            'notifications.target_id',
            'notifications.user_id',
            'ad.name',
            'ad.description',
        ]);
        return $query;
    }
}
