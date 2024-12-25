<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
          // Ensure the user is logged in and has admin privileges
          if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request); // Allow the request to proceed if the user is an admin
        }

        // Redirect the user with a more descriptive error message if they are not an admin or not logged in
        return redirect()->route('admin.login')->withErrors(['error' => 'You need admin privileges to access this page.']);
    }
}
