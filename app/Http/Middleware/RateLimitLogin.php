<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class RateLimitLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $executed = RateLimiter::attempt(
            'login:' . $request->ip(),
            $perMinute = 5,
            function() {}
        );
         
        if (!$executed) {
            return redirect('/')->withErrors(['authFailed' => __('auth.throttle')]);
        }

        return $next($request);
    }
}
