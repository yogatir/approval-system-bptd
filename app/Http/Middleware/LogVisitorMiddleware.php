<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Record the visit if the IP is new today
        VisitorLog::firstOrCreate([
            'ip' => $request->ip(),
            'created_at' => now()->startOfDay()
        ]);

        return $next($request);
    }
}
