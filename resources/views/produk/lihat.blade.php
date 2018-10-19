@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br>
    <div class="container">
      <div class="row">

    </div>
    </div>
    <div class="row">

  <div class="col-xs-6 col-md-3">
    <a href="{{url('/produk/'.$view->slug_produk)}}" class="thumbnail">
      <img src="{{url('/gambar/'.$view->foto_produk)}}" alt="barang">
    </a>
    <h4>{{$view->nama_produk}}</h4>
    {{$view->harga}}
  </div>
		</div>
</div>
@endsection
