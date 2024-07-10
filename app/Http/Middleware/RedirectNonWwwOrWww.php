<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectNonWwwOrWww
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        // Check if the host starts with 'www.'
        // if (substr($host, 0, 4) == 'www.') {
        //     // Redirect to the www version
        //     return redirect()->to($request->getScheme() . '://' . $host . $request->getRequestUri(), 301);
        // }

        // If you want to force non-www, use the following code instead:
        if (substr($host, 0, 4) === 'www.') {
            return redirect()->to('https' . '://' . substr($host, 4) . $request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
