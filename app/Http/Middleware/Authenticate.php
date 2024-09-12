<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
    
        $guards = ['admin', 'merchant', 'customer']; // Define your guards here
    
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                    case 'admin':
                        return route('admin.dashboard'); // Redirect to the admin dashboard
                    case 'merchant':
                        return route('merchant.dashboard'); // Redirect to the merchant dashboard
                    case 'customer':
                        return route('customer.dashboard'); // Redirect to the customer dashboard
                }
            }
        }
    
        // Redirect to the appropriate login page based on the guard
        if ($request->is('admin/*')) {
            return route('admin.login'); // Redirect to the admin login page
        } elseif ($request->is('merchant/*')) {
            return route('merchant.login'); // Redirect to the merchant login page
        } elseif ($request->is('customer/*')) {
            return route('customer.login'); // Redirect to the customer login page
        }
    
        return route('signin'); // Default redirect if no specific guard is matched
    }
}