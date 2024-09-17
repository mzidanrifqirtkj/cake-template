<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MidLevelAccess
{
    /**
     * Access level for merchant and admin
     * customer can't acess this page
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated as admin or merchant
        if (Auth::guard('admin')->check() || Auth::guard('merchant')->check()) {
            return $next($request);
        }

        // If not authorized, redirect to the appropriate login page or error page
        return redirect()->route('merchant.login'); // Adjust as needed
    }
}
