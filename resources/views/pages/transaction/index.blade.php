@extends('layouts.master', ["activePage" => "Package", "titlePage" => "Paket" ])

@section('title')
    <h1>Transaksi</h1>
@endsection

@section('cardHeader')
    <h3>
        Riwayat Transaksi
    </h3>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless table-striped">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">MEMBER</th>
                    <th class="text-center">KODE</th>
                    <th class="text-center">OUTLET</th>
                    <th class="text-center">PAKET</th>
                    <th class="text-center">STATUS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
