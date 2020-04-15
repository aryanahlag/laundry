<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->get();
        return view('pages.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Member::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.member.index');
    }

    public function kritTrans()
    {
        return view('pages.member.krit');
    }

    public function mTrans(Request $request)
    {
        Member::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.transaksi.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('pages.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Member::find($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        $member->delete();

        return redirect()->back()->with('msg', 'delete success');
    }
}
