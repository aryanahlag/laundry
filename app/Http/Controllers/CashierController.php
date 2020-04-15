<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cashier;


class CashierController extends Controller
{
    public function index()
    {
        $cashiers = Cashier::orderBy('name', 'asc')->get();
        return view('pages.cashier.index', compact('cashiers'));
    }

    public function create()
    {
        return view('pages.cashier.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'kasir'
        ]);
        Cashier::create([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.kasir.index');
    }

    public function edit($id)
    {
        $cashier = Cashier::where('id', $id)->with(['user'])->first();
        return view('pages.cashier.edit', compact('cashier'));
    }

    public function update(Request $request, $id)
    {
        $cashier = Cashier::find($id);
        // $password = Cript::decrypt($cashier->user->password);
        // update
        if ($request->username) {
            User::find($cashier->user_id)->update(['username'=>$request->username]);
        }
        // if ($request->$password) {
        //     User::find($cashier->user_id)->update(['password'->$password]);
        // }


        $cashier->update([
            'name' => $request->name,
            'outlet_id' => $request->outlet_id,
        ]);
        // return
        return redirect()->route('admin.kasir.index');
    }

    public function destroy($id)
    {
        $kasir = Cashier::find($id);
        // delete
        User::destroy($kasir->user_id);
        $kasir->delete();

        return redirect()->back();
    }
}
