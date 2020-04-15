@extends('layouts.master', ["activePage" => "Outlet", "titlePage" => "Outlet" ])

@section('title')
    <h1>Outlet</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar Outlet
    </h3>
@endsection

@section('content')
    <a href=" {{ route('admin.outlet.create') }} " class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Outlet</a>
    <a href=" {{ route('outlet.pdf') }} " class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print PDF</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($outlets->count() == 0)
                <tr>
                    <td colspan="4" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($outlets as $i => $o)
            <td class="text-center">{{ $i+1 }}</td>
            <td class="text-center">{{ $o->name }}</td>
            <td class="text-center">{{ $o->address }}</td>
            <td class="text-center">
                <a style="margin:2px;" href="{{ route('admin.outlet.edit', ['id'=>$o->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                <form method="POST" action="{{ route('admin.outlet.destroy', ['id'=>$o->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                </form>
            </td>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
