<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'APPLICANT') {
            return $next($request);
        }

        // If the user is not an operator, redirect or abort
        return redirect('/')->with('error', 'Access denied');
    }
}