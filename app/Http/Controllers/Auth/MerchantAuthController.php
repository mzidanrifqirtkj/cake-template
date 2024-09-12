<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MerchantAuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('merchant');
        config(['auth.defaults.passwords' => 'merchants']);
    }

    public function login()
    {
        return view('layouts.merchant.auth.login.pages.login');
    }

    public function logoutMerchant(Request $request)
    {
        Auth::guard('merchant')->logout();
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
        if (
            Auth::guard('merchant')->attempt(['email' => $request->identifier, 'password' => $request->password]) ||
            Auth::guard('merchant')->attempt(['username' => $request->identifier, 'password' => $request->password])
        ) {
            Session::flash('success', 'Login Successful! Welcome Merchant!');
            return redirect()->route('merchant.dashboard');
        } else {
            Session::flash('error', 'Login Failed! Incorrect credentials.');
            return redirect()->route('merchant.login')->withInput($request->only('identifier'));
        }
    }
}
