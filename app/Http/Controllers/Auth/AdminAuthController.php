<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('admin');
        config(['auth.defaults.passwords' => 'admins']);
    }

    public function login()
    {
        return view('layouts.admin.auth.login.pages.test');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
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
            Auth::guard('admin')->attempt(['email' => $request->identifier, 'password' => $request->password]) ||
            Auth::guard('admin')->attempt(['username' => $request->identifier, 'password' => $request->password])
        ) {
            Session::flash('success', 'Login Successful! Welcome Admin!');
            return redirect()->route('admin.dashboard');
        } else {
            Session::flash('error', 'Login Failed! Incorrect credentials.');
            return redirect()->route('admin.login')->withInput($request->only('identifier'));
        }
    }
}
