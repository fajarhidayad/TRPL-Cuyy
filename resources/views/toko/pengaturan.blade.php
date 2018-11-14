@extends('layouts.atas')

@section('content')

    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->
    <div class="container">
      <div class="row">
      <div class="col-md-5">
        <h1>Profil Toko</h1>
      </div>
    </div><br><br>
    <div class="row">
      <div class="col-md-3">
        <img src="{{url('/fototoko/'.$view->foto_toko)}}" alt="gambar" class="img-responsive thumbnail" style="width: 200px;height: 200px;">
    </div>
    <div class="col-md-9">
      <div class="row">
        <label><span class="glyphicon glyphicon-briefcase"></span> Nama Toko</label><br>
      <div class="col-md-3"><h4>{{$view->nama_toko}}</h4></div>
      </div>
      <div class="row">
        <label><span class="glyphicon glyphicon-home"></span> Alamat</label><br>
        <div class="col-md-3"><h4>{{$view->alamat_toko}}</h4></div>
      </div>
      <div class="row">
        <label><span class="glyphicon glyphicon-phone-alt"></span> Telepon</label><br>
        <div class="col-md-3"><h4>{{$view->telepon}}</h4></div>
      </div>
      <div class="row">
        <label><span class="glyphicon glyphicon-info-sign"></span> Deskripsi Toko</label><br>
        <div class="col-md-3"><h4>{{$view->deskripsi}}</h4></div>
      </div>
    </div>
		</div>
    <div class="row">
      <div class="col-md-5">
        <label>Jumlah Produk</label>
      </div>
      <div class="col-md-5">
        
      </div>
    </div>
</div>
@endsection
