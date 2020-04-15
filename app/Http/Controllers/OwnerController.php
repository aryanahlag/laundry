<?php

namespace App\Http\Controllers;

use App\Owner;
use App\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::orderBy('name', 'asc')->get();
        return view('pages.owner.index', compact('owners'));
    }

    public function create()
    {
        return view('pages.owner.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'owner'
        ]);
        Owner::create([
            'name' => $request->name,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.owner.index');
    }

    public function edit($id)
    {
        $owner = Owner::where('id', $id)->with(['user'])->first();
        return view('pages.owner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::find($id);
        // $password = Cript::decrypt($owner->user->password);
        // update
        if ($request->username) {
            User::find($owner->user_id)->update(['username'=>$request->username]);
        }
        // if ($request->$password) {
        //     User::find($cashier->user_id)->update(['password'->$password]);
        // }


        $owner->update([
            'name' => $request->name,
        ]);
        // return
        return redirect()->route('admin.owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owner::find($id);
        // delete
        User::destroy($owner->user_id);
        $owner->delete();

        return redirect()->back();
    }
}
