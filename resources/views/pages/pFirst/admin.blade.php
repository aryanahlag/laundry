@extends('layouts.master', ["activePage" => "Dashboard", "titlePage" => "Dashboard" ])

@section('title')
    <h1>Selamat Datang
            @if(Auth::user()->role == 'admin')
                <strong>Admin</strong>
            @elseif(Auth::user()->role == 'kasir')
                <strong>Admin</strong>
            @elseif(Auth::user()->role == 'owner')
                <strong>Admin</strong>
            @endif
    </h1>
@endsection

@section('cardHeader')
    <h3>
        Halo,
            @if(Auth::user()->role == 'admin')
            {{ \App\Admin::where('user_id', Auth::user()->id)->first()->name }}
            @elseif(Auth::user()->role == 'kasir')
            {{ \App\Cashier::where('user_id', Auth::user()->id)->first()->name }}
            @else
            {{ \App\Owner::where('user_id', Auth::user()->id)->first()->name }}
            @endif
         !  :)
    </h3>
@endsection
