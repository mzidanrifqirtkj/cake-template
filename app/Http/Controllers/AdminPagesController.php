<?php

namespace App\Http\Controllers;


class AdminPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('layouts.admin.panel.pages.dashboard'); // Adjust the view path as needed
    }

    public function addSeminar()
    {
        return view('layouts.admin.panel.pages.add-seminar-event');
    }
    
    public function digimikroDaftar()
    {
        return view('layouts.admin.panel.pages.digimikro-daftar');
    }

    public function event()
    {
        return view('layouts.admin.panel.pages.event');
    }

    public function seminarEvent()
    {
        return view('layouts.admin.panel.pages.seminarEvent');
    }

    public function addMerchant()
    {
        return view('layouts.admin.panel.pages.daftar-merchant');
    }
    // Display admin form

    // add other view here
}

?>
