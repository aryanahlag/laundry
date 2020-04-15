@extends('layouts.master', ["activePage" => "Dashboard", "titlePage" => "Akun Pengguna" ])

@section('title')
    <h1>Akun</h1>
@endsection

@section('cardHeader')
    Pilih Akun Pengguna
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
        <a href="{{ route('admin.kasir.index') }}" class="btn btn-outline-secondary"><i class="fas fa-cash-register"></i> Kasir</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.owner.index') }}" class="btn btn-outline-secondary"><i class="fas fa-user-shield"></i> Owner</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.activity') }}" class="btn btn-outline-secondary"><i class="fas fa-user"></i> Log User</a>
        </div>
        {{-- <div class="col-md-3">
            <a href="{{ route('admin.user') }}" class="btn btn-outline-secondary"><i class="fas fa-user"></i> User</a>
        </div> --}}
    </div>
@endsection
