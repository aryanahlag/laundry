<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('pages.pFirst.admin');
    }

    public function kasir()
    {
        return view('pages.pFirst.kasir');
    }

    public function owner()
    {
        return view('pages.pFirst.owner');
    }
}
