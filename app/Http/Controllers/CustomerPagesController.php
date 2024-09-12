<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('customer.dashboard'); // Adjust the view path as needed
    }
    // Display admin form

    // add other view here
}
