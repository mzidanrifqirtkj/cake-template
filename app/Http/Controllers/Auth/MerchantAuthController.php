<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantAuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('merchant');
        config(['auth.defaults.passwords' => 'merchants']);
    }

    public function login()
    {
        // edit this
        return view('merchant_auth.merchantlogin');
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
            'identifier' => 'required|string', // Adjusted to match the input field
            'password' => 'required|min:5|max:30',
        ]);

        // Attempt authentication with both email and username
        if (
            Auth::guard('merchant')->attempt(['email' => $request->identifier, 'password' => $request->password]) ||
            Auth::guard('merchant')->attempt(['username' => $request->identifier, 'password' => $request->password])
        ) {
            // Authentication was successful...
            return redirect()->route('/'); // Ensure 'merchant admin page' route is defined
        } else {
            return redirect()->route('merchant.login')->with('fail', 'Incorrect credentials');
        }
    }
}
