@extends('layouts.master', ["activePage" => "Package", "titlePage" => "Paket" ])

@section('title')
    <h1>Paket</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar Paket
    </h3>
@endsection

@section('content')
    <a href=" {{ route('admin.paket.create') }} " class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Paket</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">HARGA</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($packages->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($packages as $i => $t)
            <tr>
            <td class="text-center">{{ $i+1 }}</td>
            <td class="text-center">{{ $t->name }}</td>
            <td class="text-center">{{ $t->price }}</td>
            <td class="text-center">{{ $t->type->name }}</td>
            <td class="text-center">
                <a style="margin:2px;" href="{{ route('admin.paket.edit', ['id'=>$t->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                <form method="POST" action="{{ route('admin.paket.destroy', ['id'=>$t->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                </form>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
