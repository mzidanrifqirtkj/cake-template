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
        Auth::setDefaultDriver('customer');
        config(['auth.defaults.passwords' => 'customers']);
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
        if (
            Auth::guard('customer')->attempt(['email' => $request->identifier, 'password' => $request->password]) ||
            Auth::guard('customer')->attempt(['username' => $request->identifier, 'password' => $request->password])
        ) {
            Session::flash('success', 'Login Successful! Welcome Customer!');
            return redirect()->route('customer.dashboard');
        } else {
            Session::flash('error', 'Login Failed! Incorrect credentials.');
            return redirect()->route('customer.login')->withInput($request->only('identifier'));
        }
    }

    public function showRegisterForm()
    {
        return view('layouts.customer.auth.register.pages.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Example validation for phone
            'username' => 'required|string|unique:customers|max:255',
            'email' => 'required|string|email|unique:customers|max:255',
            'password' => 'required|string|min:5|confirmed',
        ]);

        // Create a new customer account
        $customer = new \App\Models\Customer\Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = $request->password; // This will call the mutator
        $customer->save(); // UUID is generated here automatically

        Session::flash('success', 'Registration Successful! You can now log in.');
        return redirect()->route('customer.login');
    }
}
