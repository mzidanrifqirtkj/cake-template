<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('customer');
        config(['auth.defaults.passwords' => 'customers']);
    }

    public function login()
    {
        // edit this
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
            'identifier' => 'required|string', // Adjusted to match the input field
            'password' => 'required|min:5|max:30',
        ]);

        // Attempt authentication with both email and username
        if (
            Auth::guard('customer')->attempt(['email' => $request->identifier, 'password' => $request->password]) ||
            Auth::guard('customer')->attempt(['username' => $request->identifier, 'password' => $request->password])
        ) {
            // Authentication was successful...
            return redirect()->route('/'); // Ensure 'landing page' route is defined
        } else {
            return redirect()->route('customer.login')->with('fail', 'Incorrect credentials');
        }
    }
}
