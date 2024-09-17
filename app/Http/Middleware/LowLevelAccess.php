<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LowLevelAccess
{
    /**
     * Handle an incoming request.
     *
     * All role access
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna terautentikasi dengan salah satu guard yang diperlukan
        if (Auth::guard('customer')->check() || Auth::guard('admin')->check() || Auth::guard('merchant')->check()) {
            return $next($request);
        }

        // Jika pengguna tidak terautentikasi, arahkan ke halaman login yang sesuai
        if ($request->is('admin/*')) {
            return redirect()->route('admin.login'); // Redirect ke halaman login admin
        } elseif ($request->is('merchant/*')) {
            return redirect()->route('merchant.login'); // Redirect ke halaman login merchant
        } elseif ($request->is('customer/*')) {
            return redirect()->route('customer.login'); // Redirect ke halaman login customer
        }

        return redirect()->route('customer.login'); // Default redirect jika tidak ada guard yang cocok
    }
}
