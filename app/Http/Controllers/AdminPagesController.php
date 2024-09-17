<?php

namespace App\Http\Controllers;


class AdminPagesController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('layouts.admin.panel.dashboard.pages.dashboard'); // Adjust the view path as needed
    }

    public function addSeminar()
    {
        return view('layouts.admin.panel.add-seminar.pages.add-seminar-event');
    }
    
    public function digimikroDaftar()
    {
        return view('layouts.admin.panel.digimikro-daftar.pages.digimikro-daftar');
    }

    public function event()
    {
        return view('layouts.admin.panel.event.pages.event');
    }

    public function seminarEvent()
    {
        return view('layouts.admin.panel.seminar-event.pages.seminar-event');
    }

    // public function addMerchant()
    // {
    //     return view('layouts.admin.panel.daftar-merchant.pages.daftar-merchant');
    // }
    // Display admin form

    // add other view here
}

?>
