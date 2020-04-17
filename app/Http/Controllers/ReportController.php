<?php

namespace App\Http\Controllers;

use App\detailTransaction;
use App\Transaction;
use Date;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.owner.report');
    }
    public function rOwnerM(Request $request)
    {
        $trans = Transaction::where('date', '>', $request->begin)->where('date_line', '<', $request->until)->with(['outlet', 'detailTransaction', 'user'])->get();

        $begin = str_replace('-', '', Date::parse($request->begin)->format('dmy'));
        $until = str_replace('-','', Date::parse($request->until)->format('dmy'));

        $pdf = PDF::loadView('layouts.pdf.owner', compact('trans'));

        return $pdf->download('trans('.$begin.' - '.$until.').pdf');
    }
}
