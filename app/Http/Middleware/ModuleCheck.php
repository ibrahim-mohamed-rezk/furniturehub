<?php

namespace App\Http\Middleware;

use App\Models\Module;
use App\Models\UserModule;
use Closure;
use Illuminate\Support\Facades\Route;

class ModuleCheck
{
    /**
     * Handle an incoming request.
     * Redirect user to admin login page if he has not the previliage to access the admin panel
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) :mixed
    {
        if(Route::currentRouteName() == null){
            return $next($request);
        }

        $action=explode('.',Route::currentRouteName())[0];
        $module = Module::where('path',$action)->first();
        $user_module = UserModule::where('module_id',$module->id)->where('user_id',\Auth::user()->id)->first();

        if (  $user_module ) {
            return $next($request);
        }

        return redirect(getCurrentLocale().'/admin');
    }
}
