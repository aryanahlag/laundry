<?php

namespace App\Http\Controllers;

use App\Outlet;
use Excel;
use PDF;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::orderBy('name', 'asc')->get();
        return view('pages.outlet.index', compact('outlets'));
    }

    public function create()
    {
        return view('pages.outlet.create');
    }

    public function store(Request $request)
    {
        Outlet::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.outlet.index');
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('pages.outlet.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        Outlet::find($id)->update([
            'name'=> $request->name,
            'address'=> $request->address,
        ]);

        return redirect()->route('admin.outlet.index');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);

        $outlet->delete();

        return redirect()->back()->with('msg', 'delete success');
    }

    public function pdf()
    {
        $outlet = Outlet::all();

        $pdf = PDF::loadView('layouts.pdf.outlet', compact('outlet'));

        return $pdf->download('outlet.pdf');
    }
}
