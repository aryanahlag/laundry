@extends('layouts.master', ["activePage" => "Akun Pengguna", "titlePage" => "Akun Pengguna-Owner" ])

@section('title')
    <h1>Owner</h1>
@endsection

@section('cardHeader')
    <h3>
        Buat Owner
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.owner.update', ['id'=>$owner->id]) }}" method="post">
@csrf
@method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                    <input value="{{ $owner->name }}" name="name" type="text" class="form-control" autofocus required="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input value="{{ $owner->user->username }}" name="username" type="text" class="form-control" required="">
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
