@extends('layouts.master', ["activePage" => "Jenis", "titlePage" => "Jenis" ])

@section('title')
    <h1>Jenis</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar Jenis
    </h3>
@endsection

@section('content')
    <a href=" {{ route('admin.jenis.create') }} " class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Jenis</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($types->count() == 0)
                <tr>
                    <td colspan="3" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($types as $i => $t)
            <tr>
            <td class="text-center">{{ $i+1 }}</td>
            <td class="text-center">{{ $t->name }}</td>
            <td class="text-center">
                <form method="POST" action="{{ route('admin.jenis.destroy', ['id'=>$t->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    <a style="margin:2px;" href="{{ route('admin.jenis.edit', ['id'=>$t->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                </form>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
