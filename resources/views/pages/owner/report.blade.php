@extends('layouts.master', ["activePage" => "Dashboard", "titlePage" => "Akun Pengguna" ])

@section('title')
    <h1>Laporan Transaksi</h1>
@endsection

@section('cardHeader')
    Pilih Waktu Laporan Transaksi
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5 form-group card" style="background-color:lightgray;">
            <form action="" method="post">
                <label for="">Berdasarkan Bulan</label>
                <input type="month" class="form-control" name="" id="">
                <br>
                <button type="submit" class="btn btn-sm float-right btn-danger mb-2" id="month"><i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5 form-group card" style="background-color:lightgray;">
            <form action="" method="post">
                <label for="">Berdasarkan Minggu</label>
                <input type="week" class="form-control" name="" id="">
                <br>
                <button type="submit" class="btn btn-sm float-right btn-danger mb-2" id="month"><i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 form-group card" style="background-color:lightgray;">
            <form action="" method="post">
                <h3 for="">Berdasarkan Tanggal</h3>
                <label for="">Awal</label>
                <input type="date" class="form-control" name="date" id="date">
                <br>
                <label for="">Akhir</label>
                <input type="date" class="form-control" name="date_line" id="date">
                <br>
                <button type="submit" class="btn btn-sm float-right btn-danger mb-2" id="month"><i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
    </div>
@endsection
