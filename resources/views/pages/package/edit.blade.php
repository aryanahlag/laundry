@extends('layouts.master', ["activePage" => "Package", "titlePage" => "Paket" ])

@section('title')
    <h1>Paket</h1>
@endsection

@section('cardHeader')
    <h3>
        Edit Paket
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.paket.update', ['id'=>$package->id]) }}" method="post">
@csrf
@method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                    <input value="{{ $package->name }}" name="name" type="text" class="form-control" autofocus required="">
                    </div>
                    <div class="form-group">
                        <label for="">HARGA</label>
                    <input value="{{ $package->price }}" name="price" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">JENIS</label>
                        <select name="type_id" id="" class="form-control" required="">
                          <option value="">Pilih Jenis</option>
                          @foreach(\App\Type::orderBy('name', 'asc')->get() as $t)
                            <option value="{{ $t->id }}" {{ $package->type == $t ? 'selected' : '' }}>{{ $t->name }}</option>
                          @endforeach
                        </select>
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
