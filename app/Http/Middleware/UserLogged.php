<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLogged
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
        if ( ! Auth::check() ) {
            return redirect(route('web.login'));
        }

        return $next($request);
    }
}
