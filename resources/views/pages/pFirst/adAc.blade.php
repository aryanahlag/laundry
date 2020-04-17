@extends('layouts.master', ["activePage" => "Akun Pengguna", "titlePage" => "Akun Pengguna-Owner" ])

@section('title')
    <h1>User</h1>
@endsection

@section('cardHeader')
    <h3>
        Daftar User
    </h3>
@endsection

@section('content')
    {{-- <a href="" class="btn btn-success"><i class="fas fa-folder-plus"></i> Tambah Owner</a> --}}
    {{-- <br> --}}
    {{-- <br> --}}
    <div class="table-responsive">
        <table class="table table-borderless table-striped" id="tableJenis">
            <thead style="background-color: lightgreen;">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA</th>
                    <th class="text-center">USERNAME AKUN</th>
                    <th class="text-center">JABATAN</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @if ($users->count() == 0)
                <tr>
                    <td colspan="4" class="text-center">No data</td>
                </tr>
            @endif
            @foreach ($users as $i => $c)
            <tr>
                <td class="text-center">{{ $i+1 }}</td>
                <td class="text-center">
                    @if($c->role == 'admin')
                      {{ $c['admin']->name }}
                  @elseif($c->role == 'kasir')
                      {{ $c['kasir']->name }}
                  @else
                      {{ $c['owner']->name }}
                  @endif
                </td>
                <td class="text-center">{{ $c->username }}</td>
                <td class="text-center">
                    @if($c->role == 'admin')
                    <label for="" class="badge badge-success">
                      {{ $c->role }}
                    </label>
                  @elseif($c->role == 'kasir')
                    <label for="" class="badge badge-danger">
                      {{ $c->role }}
                    </label>
                  @else
                    <label for="" class="badge badge-primary">
                      {{ $c->role }}
                    </label>
                  @endif
                </td>
                <td class="text-center">
                    <form method="POST" action="{{ route('admin.owner.destroy', ['id'=>$c->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                        <a style="margin:2px;" href="{{ route('admin.owner.edit', ['id'=>$c->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
