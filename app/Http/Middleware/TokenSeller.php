<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class TokenSeller
{
    /**
     * Handle an incoming request.
     * Redirect user to admin login page if he has not the previliage to access the admin panel
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = \Session::get('seller');
        if (  isset($request->seller) ) {
            \Session::put('seller', $request->seller);
            $token = $request->seller;
        }
        if($token)
        {
            $seller = Seller::where('token',$token)->first();
            if($seller)
            {
                if(Auth::user())
                {
                    $user = Auth::user();
                    $user->update(['seller_id'=>$seller->id]);
                    session()->forget('seller');
                }
                else
                {
                    $route = \Request::route()->getName();
                    
                    if(!in_array($route,['web.login','web.register','web.login_check','web.register_check','web.index']))
                    {
                        return redirect()->route('web.login');
                    }
                }
            }
        }
        return $next($request);
    }
}
