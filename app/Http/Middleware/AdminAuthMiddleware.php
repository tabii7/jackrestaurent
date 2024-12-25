<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is an admin (you can customize this as per your needs)
        if (!Auth::check() || !Auth::user()->is_admin == 1) {
            return redirect()->route('admin.login'); // Redirect to the login page if not authenticated or not an admin
        }

        return $next($request); // Proceed to the next request if the user is authenticated and an admin
    }
}
