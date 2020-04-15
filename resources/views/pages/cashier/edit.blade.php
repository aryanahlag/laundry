@extends('layouts.master', ["activePage" => "Akun Pengguna", "titlePage" => "Akun Pengguna-Kasir" ])

@section('title')
    <h1>Kasir</h1>
@endsection

@section('cardHeader')
    <h3>
        Buat Kasir
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.kasir.update', ['id'=>$cashier->id]) }}" method="post">
@csrf
@method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                    <input value="{{ $cashier->name }}" name="name" type="text" class="form-control" autofocus required="">
                    </div>
                    <div class="form-group">
                        <label for="">Outlet</label>
                        <select name="outlet_id" id="" class="form-control" required="">
                          <option value="">Pilih Outlet</option>
                          @foreach(\App\Outlet::orderBy('name', 'asc')->get() as $t)
                            <option value="{{ $t->id }}" {{ $cashier->outlet == $t ? 'selected' : '' }}>{{ $t->name }}</option>
                          @endforeach
                        </select>
                       </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input value="{{ $cashier->user->username }}" name="username" type="text" class="form-control" required="">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <h5>Aksi</h5>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.kasir.index') }}" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
