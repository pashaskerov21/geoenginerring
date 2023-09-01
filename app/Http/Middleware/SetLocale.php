<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->segment(1), ['tr', 'en', 'ru'])) {
            app()->setLocale($request->segment(1));
            Session::put('lang', $request->segment(1));
            return $next($request);
        } else {
            app()->setLocale('az');
            Session::put('lang', 'az');
            return $next($request);
        }
    }
}
