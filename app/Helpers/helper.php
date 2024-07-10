<?php

use App\Models\Language;
use App\Models\Setting;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


if (!function_exists('currentLanguage'))
{
    /**
    * Return current language from database
    * @return mixed
    */
    function currentLanguage()
    {
        $languages = Language::where('status', 1)->where('local', LaravelLocalization::getCurrentLocale())->first();
        return $languages;
    }
}

if (!function_exists('getCurrentLocale'))
{
/**
* Return current current locale from database
* @return mixed
*/
    function getCurrentLocale()
    {
        $current = Language::where('local', LaravelLocalization::getCurrentLocale())->first()->local;
        return $current;
    }
}
if (!function_exists('languages'))
{
    /**
     * Return list of languages from database
     * @return mixed
     */
    function languages()
    {
        $languages = Language::where('status', 1)->cursor();
        return $languages;
    }
}


if (!function_exists('settings')){

    /**
     * Return settings
     * @param null $key
     * @return mixed
     */
    function settings($key = null)
    {
        $settings = [];
        if ($key){
            $settings = Setting::where('key', $key)->first()->value;
        } else {
            $allSettings = Setting::cursor()->toArray();
            foreach ($allSettings as $setting) {
                $settings[$setting['key']] = $setting['value'];
            }
        }
        return $settings;
    }

}
