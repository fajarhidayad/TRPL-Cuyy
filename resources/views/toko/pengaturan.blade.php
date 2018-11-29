@extends('layouts.atas')

@section('content')
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif; color: salmon; ">

    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->
    <div class="container">
       <h1 style="font-size: 50px;"><center>Profil Toko </center> </h1>
      <div class="row">
      <div class="col-md-5">
       
      </div>
    </div><br><br>
    <div class="row" style="width: 950px; height: 350px; margin: auto; padding: 10px; background-color: rgba(0,0,0,0.5); font-size: 20px;">
      <div class="col-md-3">
        <img src="{{url('/fototoko/'.$view->foto_toko)}}" alt="gambar" class="img-responsive thumbnail" style="width: 200px;height: 200px;">
    </div>
    <div class="col-md-9">
      <div class="row" style="margin-left: 80px">
        <label><span class="glyphicon glyphicon-briefcase"></span> Nama Toko</label><br>
      <div class="col-md-3"><h4>{{$view->nama_toko}}</h4></div>
      </div>
      <div class="row" style="margin-left: 80px">
        <label><span class="glyphicon glyphicon-home"></span> Alamat</label><br>
        <div class="col-md-3"><h4>{{$view->alamat_toko}}</h4></div>
      </div>
      <div class="row" style="margin-left: 80px">
        <label><span class="glyphicon glyphicon-phone-alt"></span> Telepon</label><br>
        <div class="col-md-3"><h4>{{$view->telepon}}</h4></div>
      </div>
      <div class="row" style="margin-left: 80px">
        <label><span class="glyphicon glyphicon-info-sign"></span> Deskripsi Toko</label><br>
        <div class="col-md-3"><h4>{{$view->deskripsi}}</h4></div>
      </div>
      <div class="row" style="margin-left: 500px">
        <a href="pengaturan-toko/ubah" class="btn btn-primary">Ubah Toko</a>
      </div>
    </div>
		</div>
    <div class="row">
      <div class="col-md-5" style="font-size: 35px;">
        <label>Semua Produk Toko</label>
      </div>
      <div class="col-md-5">
        
      </div>
    </div>
    <div class="row"><br>
      @foreach($produk as $data)
      <div class="col-xs-6 col-md-3">
        <a href="{{url('/produk/'.$data->slug_produk)}}" class="thumbnail">
        <img src="{{url('/gambar/'.$data->foto_produk)}}" alt="barang" style="width:150px;height:150px">
        </a>
        <h4>{{$data->nama_produk}}</h4>
        {{$data->harga}}
      </div>
      @endforeach
    </div>
    <div style="margin-bottom: 50px;">
      
    </div>
</div>
@endsection
