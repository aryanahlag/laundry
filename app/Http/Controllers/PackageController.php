<?php

namespace App\Http\Controllers;

use App\Package;
use DataTables;
use DB;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('name', 'asc')->get();
        return view('pages.package.index', compact('packages'));
    }

    public function create()
    {
        return view('pages.package.create');
    }

    public function store(Request $request)
    {
        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('admin.paket.index');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);

        return view('pages.package.edit', compact('package'));


    }

    public function update(Request $request, $id)
    {
        Package::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('admin.paket.index');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        $package->delete();
        return redirect()->back()->with('msg', 'Delete success');
    }

    public function findPack()
    {
        // $package = DB::table('packages')
        // ->join('types', 'packages.type_id', '=', 'types.id')
        // ->select('packages.id',
        //         'packages.name',
        //         'packages.price',
        //         'packages.info',
        //         'type.name'
        //         )->get();
        $package = Package::orderBy('name', 'asc')->get();
        return response()->json(['data' => $package]);
        // return DataTables::of($package)->addIndexColumn()->make(true);
    }
}
