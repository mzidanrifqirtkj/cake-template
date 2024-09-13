<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('layouts.admin.panel.pages.dashboard'); // Adjust the view path as needed
    }
    // Display admin form

    // add other view here
}

?>