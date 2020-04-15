<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Admin;
use App\Kasir;
use App\Owner;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class AccountController extends Controller
{
    public function account()
    {
        return view('pages.pFirst.account');
    }

    public function myTestAddToLog()
    {
        LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }

    public function logActivity()
    {
        $logs = LogActivity::logActivityLists();
        return view('pages.pFirst.log',compact('logs'));
    }

    public function admin()
    {
        $admin = User::with('admin')->orderBy('username', 'asc')->get();

        return $admin;
    }
    public function kasir()
    {
        $kasir = User::with('cashier')->orderBy('username', 'asc')->get();

        return $kasir;
    }
    public function owner()
    {
        $owner = User::with('owner')->orderBy('username', 'asc')->get();

        return $owner;
    }

    public function pdf()
    {
        $user = User::all();

        $pdf = PDF::loadView('layouts.pdf.user', compact('user'));

        return $pdf->download('user.pdf');
    }
}
