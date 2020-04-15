@extends('layouts.master', ["activePage" => "Jenis", "titlePage" => "Jenis" ])

@section('title')
    <h1>Jenis</h1>
@endsection

@section('cardHeader')
    <h3>
        Buat Jenis
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.jenis.store') }}" method="post">
@csrf
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input name="name" type="text" class="form-control" autofocus required="">
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
