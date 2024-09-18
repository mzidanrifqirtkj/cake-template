<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('layouts.customer.checkout.pages.chackout'); // Adjust the view path as needed
    }

    public function checkout()
    {
        return view('layouts.customer.checkout.pages.chackout');
    }

    public function profile()
    {
        return view('layout.customer.profile.pages.profile');
    }
    // Display admin form

    // add other view here
}
