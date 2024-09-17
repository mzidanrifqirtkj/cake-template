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
        return view('layouts.admin.auth.login.pages.signin');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showMerchantRegisterForm()
    {
        return view('layouts.admin.panel.pages.daftar-merchant');
    }

    public function addMerchant(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:customers|max:255',
            'email' => 'required|string|email|unique:customers|max:255',
            'password' => 'required|string|min:5|confirmed',
        ]);
        // Create a new customer account
        $merchant = new \App\Models\merchant\Merchant();
        $merchant->username = $request->username;
        $merchant->email = $request->email;
        $merchant->password = $request->password; // Hash the password
        $merchant->save(); // UUID is generated here automatically

        Session::flash('success', 'Registration Successful! You can now log in.');
        return redirect()->route('admin.add-merchant');
    }

}
