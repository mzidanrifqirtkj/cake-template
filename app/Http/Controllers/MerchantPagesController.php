<?php

namespace App\Http\Controllers;

class MerchantPagesController extends Controller
{
    // Display the merchant dashboard
    public function index()
    {
        return view('layouts.merchant.panel.pages.admin'); // Adjust the view path as needed
    }

    public function checkout()
    {
        return view('layouts.customer.checkout.pages.chackout');
    }
    // Display admin form

    // add other view here
}
