<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('merchant.dashboard'); // Adjust the view path as needed
    }
    // Display admin form

    // add other view here
}
