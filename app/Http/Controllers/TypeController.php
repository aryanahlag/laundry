<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('name', 'asc')->get();
        return view('pages.type.index', compact('types'));
    }

    public function create()
    {
        return view('pages.type.create');
    }

    public function store(Request $request)
    {
        Type::create([
            'name' => $request ->name
        ]);

        return redirect()->route('admin.jenis.index');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('pages.type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        Type::find($id)->update([
            'name' => $request -> name
        ]);

        return redirect()->route('admin.jenis.index');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        $type->delete();

        return redirect()->back()->with('msg', 'delete success');
    }

}
