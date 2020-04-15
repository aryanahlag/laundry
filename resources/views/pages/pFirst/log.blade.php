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
            <h3>Aktivitas Akun</h3>
	    <table class="table table-borderless table-striped">
            <tr>
                <th>No</th>
                <th>Pesan</th>
                <th>URL</th>
                <th>User</th>
            </tr>
            @if($logs->count() == 0)
                <tr>
                    <th colspan="4" class="text-center">No data</th>
                </tr>
            @endif
			@foreach($logs as $key => $log)
			<tr>
				<td>{{ ++$key }}</td>
				<td>{{ $log->msg }}</td>
				<td class="text-success">{{ $log->url }}</td>
				<td>{{ $log->user_id }}</td>
			</tr>
			@endforeach
		{{-- @endif --}}
	    </table>
        </div>
    </div>
@endsection
