@extends('layouts.master', ["activePage" => "Dashboard", "titlePage" => "Dashboard" ])

@section('title')
    <h1>Selamat Datang
            @if(Auth::user()->role == 'admin')
                <strong>Owner</strong>
            @elseif(Auth::user()->role == 'kasir')
                <strong>Admin</strong>
            @elseif(Auth::user()->role == 'owner')
                <strong>Admin</strong>
            @endif
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- small box -->
        <div class="small-box" style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
          <div class="inner">
            <h4 style="text-align:center;">
                @php
                    $tanggal= mktime(date("m"),date("d"),date("Y"));
                      echo "<b>".date("d-M-Y", $tanggal)."</b> ";
                      date_default_timezone_set('Asia/Jakarta');
                      $jam=date("H:i:s");
                      echo  "<br>"."Pukul : <b>". $jam." "."</b>";
                      $a = date ("H");
                      if (($a>=4) && ($a<=11)){
                      echo "<b>, Selamat Pagi</b>";
                      }
                      else if(($a>11) && ($a<=18))
                      {
                      echo "<br>"."<br>"."Selamat Sore";}
                      else { echo ", <b> Selamat Malam</b>";}
                @endphp
            </h4>

            <h4 style="text-align:center;">@if(Auth::user()->role == 'admin')
                {{ \App\Admin::where('user_id', Auth::user()->id)->first()->name }}
                @elseif(Auth::user()->role == 'kasir')
                {{ \App\Cashier::where('user_id', Auth::user()->id)->first()->name }}
                @else
                {{ \App\Owner::where('user_id', Auth::user()->id)->first()->name }}
                @endif</h4>
          </div>
        </div>
      </div>
</div>
{{-- <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background: linear-gradient(to top, #0099ff 0%, #ff99ff 100%);">
        <div class="inner">
          <h3>10<sup style="font-size: 12px"> pack</sup></h3>

          <p>Total Order</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background: linear-gradient(to right, #ffcc00 0%, #ff6666 100%);">
        <div class="inner">
          <h3>2<sup style="font-size: 12px"> pack</sup></h3>

          <p>Order(Belum dikerjakan)</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background: linear-gradient(to top, #0099ff 0%, #ff99ff 100%);">
        <div class="inner">
          <h3>6<sup style="font-size: 12px"> pack</sup></h3>

          <p>Order(Sudah Selesai)</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background: linear-gradient(to right, #ffcc00 0%, #ff6666 100%);">
        <div class="inner">
          <h3>2<sup style="font-size: 12px"> pack</sup></h3>

          <p>Order(Belum Diambil)</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div> --}}
    <!-- ./col -->

    <!-- ./col -->
  </div>
@endsection
