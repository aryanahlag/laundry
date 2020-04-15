@extends('layouts.master', ["activePage" => "Dashboard", "titlePage" => "Aktivitas-Akun" ])

@section('title')
    <h1>Akun</h1>
@endsection

@section('cardHeader')
    Akun Pengguna
@endsection

@section('content')
    <div class="row">
        <div class="table-responsive">
            <h3>Seluruh Akun</h3>
	    <table class="table table-borderless table-striped">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
            </tr>
            @if($users->count() == 0)
                <tr>
                    <th colspan="4" class="text-center">No data</th>
                </tr>
            @endif
			@foreach($users as $key => $log)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $log->username }}</td>
				<td>{{ $log->name }}</td>
				<td>{{ $log->role }}</td>
			</tr>
			@endforeach
		{{-- @endif --}}
	    </table>
        </div>
    </div>
@endsection
