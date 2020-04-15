@extends('layouts.master', ["activePage" => "Member", "titlePage" => "Member" ])

@section('title')
    <h1>Member</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar Member
    </h3>
@endsection

@section('content')
    <a href=" {{ route('admin.member.create') }} " class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Member</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">TELEFON</th>
                    <th class="text-center">GENDER</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($members->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($members as $i => $c)
            <tr>
                <td class="text-center">{{ $i+1 }}</td>
                <td class="text-center">{{ $c->name }}</td>
                <td class="text-center">{{ $c->address }}</td>
                <td class="text-center">{{ $c->phone }}</td>
                <td class="text-center">{{ $c->gender }}</td>
                <td class="text-center">
                    <a style="margin:2px;" href="{{ route('admin.member.edit', ['id'=>$c->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    <form method="POST" action="{{ route('admin.member.destroy', ['id'=>$c->id]) }}">
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
