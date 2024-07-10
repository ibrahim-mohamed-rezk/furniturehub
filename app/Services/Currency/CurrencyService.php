<?php
namespace App\Services\Currency;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrencyService
{
    public function getCurrency()
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $currency = null;
        if($user)
        {
            $currency = Currency::withDescription($user->currency_id)->first();
        }
        else
        {
            $currency_id = session('currency_id');
            $currency = Currency::withDescription($currency_id)->first();
        }
        if(is_null($currency))
        {
            $currency = Currency::withDescription(1)->first();
        }
        return $currency;
    }
    public function setCurrency($currency_id)
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        if ($user)
        {
            $user->update(['currency_id'=>$currency_id]);
        }
        else
        {
            session()->put('currency_id',$currency_id);
        }
        return $this->getCurrency();
    }
}
