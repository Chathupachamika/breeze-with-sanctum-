<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action');
        }
        return $next($request);
    }
}
