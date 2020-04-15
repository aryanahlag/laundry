@extends('layouts.master', ["activePage" => "Outlet", "titlePage" => "Outlet" ])

@section('title')
    <h1>Outlet</h1>
@endsection

@section('cardHeader')
    <h3>
        Edit Outlet
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.outlet.update', ['id'=>$outlet->id]) }}" method="post">
@csrf
@method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                    <input value="{{ $outlet->name }}" name="name" type="text" class="form-control" autofocus required="">
                    </div>
                    <div class="form-group">
                        <label for="">ALAMAT</label>
                        <input value="{{ $outlet->address }}" name="address" type="text" class="form-control" required="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.jenis.index') }}" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
