<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class I18n 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('language')) {
            $language = session('language');
            config(['app.locale' => $language]);
        } 
        
        return $next($request);
    }
}
