@extends('layouts.master', ["activePage" => "Member", "titlePage" => "Member" ])

@section('title')
    <h1>Member</h1>
@endsection

@section('cardHeader')
    <h3>
        Edit Member
    </h3>
@endsection

@section('content')
<form action="{{ route('admin.member.update', ['id'=>$member->id])  }}" method="post">
@csrf
@method('put')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input name="name" type="text" value="{{ $member->name }}" class="form-control" autofocus required="">
                    </div>
                    <div class="form-group">
                        <label for="">ALAMAT</label>
                        <input name="address" type="text" value="{{ $member->address }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">TELEFON</label>
                        <input name="phone" type="number" value="{{ $member->phone }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control" required="">
                          <option disabled>Pilih Gender</option>
                          <option value="laki-laki" {{ $member->gender == "laki-laki" ? "selected" : "" }}>Laki-Laki</option>
                            <option value="perempuan" {{ $member->gender == "perempuan" ? "selected" : "" }}>Perempuan</option>
                        </select>
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
                            <a href="{{ route('admin.member.index') }}" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
