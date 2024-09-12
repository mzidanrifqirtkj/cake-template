<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    public function __construct()
    {
        // Optional: Ensure the guard is set if not default
        // Auth::setDefaultDriver('customer');
        // config(['auth.defaults.passwords' => 'customers']);
    }

    public function login()
    {
        return view('layouts.customer.auth.login.pages.signin');
    }

    public function logoutCustomer(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|min:5|max:30',
        ]);

        // Attempt authentication with both email and username
        $credentials = [
            'password' => $request->password,
        ];

        // Attempt with email
        $credentials['email'] = $request->identifier;

        if (Auth::guard('customer')->attempt($credentials)) {
            Session::flash('success', 'Login Successful! Welcome Customer!');
            return redirect()->route('customer.dashboard');
        }

        // Attempt with username
        $credentials['username'] = $request->identifier;
        if (Auth::guard('customer')->attempt($credentials)) {
            Session::flash('success', 'Login Successful! Welcome Customer!');
            return redirect()->route('customer.dashboard');
        }

        // If authentication fails
        Session::flash('error', 'Login Failed! Incorrect credentials.');
        return redirect()->route('customer.login')->withInput($request->only('identifier'));
    }
}