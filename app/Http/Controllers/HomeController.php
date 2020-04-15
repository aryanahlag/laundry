<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function init()
    {
        if (Auth::guest()) {
            return redirect()->route('home');
        } else {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role == 'kasir') {
                return redirect()->route('kasir.dashboard');
            } else {
                return redirect()->route('owner.dashboard');
            }
        }
    }
}
