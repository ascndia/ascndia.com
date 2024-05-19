<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('user')) {
            return $next($request);
        }

        // Redirect or respond with an error message if the session user is not available
        // For example:
        return redirect('/login')->with('error', 'You need to be logged in to access this page.');
    }
}
