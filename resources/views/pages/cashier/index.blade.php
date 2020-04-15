@extends('layouts.master', ["activePage" => "Akun Pengguna", "titlePage" => "Akun Pengguna-Kasir" ])

@section('title')
    <h1>Kasir</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar Kasir
    </h3>
@endsection

@section('content')
    <a href=" {{ route('admin.kasir.create') }} " class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Kasir</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">OUTLET</th>
                    <th class="text-center">USERNAME AKUN</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($cashiers->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($cashiers as $i => $c)
            <tr>
                <td class="text-center">{{ $i+1 }}</td>
                <td class="text-center">{{ $c->name }}</td>
                <td class="text-center">{{ $c->outlet->name }}</td>
                <td class="text-center">{{ $c->user->username }}</td>
                <td class="text-center">
                    <a style="margin:2px;" href="{{ route('admin.kasir.edit', ['id'=>$c->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    <form method="POST" action="{{ route('admin.kasir.destroy', ['id'=>$c->id]) }}">
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
