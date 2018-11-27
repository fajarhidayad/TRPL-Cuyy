@extends('layouts.atas')

@section('content')

<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif;">
<div class="container" style="color: salmon;">
    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->
    <div class="container">
      <div class="row">
      <div class="col-md-5">
        <a href="{{url('/produk/tambah')}}" class="btn btn-primary">
          Tambah Produk
        </a>
    </div>
    </div><br><br>
    <div class="row">
      @foreach($view as $data)
  <div class="col-xs-6 col-md-3">
    <a href="{{url('/produk/'.$data->slug_produk)}}" class="thumbnail">
      <img src="{{url('/gambar/'.$data->foto_produk)}}" alt="barang" style="width:150px;height:150px">
    </a>
    <h4>{{$data->nama_produk}}</h4>
    {{$data->harga}}
  </div>
@endforeach
		</div>
    <div class="row">
      <h2>Stok Kosong</h2>
      <div class="row">
      @foreach($kosong as $kosongg)
        <div class="col-xs-6 col-md-3">
        <a href="{{url('/produk/'.$kosongg->slug_produk)}}" class="thumbnail">
          <img src="{{url('/gambar/'.$kosongg->foto_produk)}}" alt="barang" style="width:150px;height:150px">
        </a>
        <h4>{{$kosongg->nama_produk}}</h4>
        {{$kosongg->harga}}
        </div>
      @endforeach
    </div>
</div>
@endsection
