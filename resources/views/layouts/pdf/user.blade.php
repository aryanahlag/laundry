@extends('layouts.pdf_template')

@section('content')
	<table>
		<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama</th>
		</tr>
		</thead>
		<tbody>
			@foreach($user as $data)
				<tr>
					<td>{{ $loop->index + 1 }}</td>
					<td>{{ $data->username }}</td>
					<td>
                        @if ($data->role == 'admin')
                            
                        @elseif ($data->role == 'kasir')
                            Kasir
                        @else
                            Owner
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
