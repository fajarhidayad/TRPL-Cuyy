@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br>
    <div class="container">
      <div class="row">
      <div class="col-md-5 col-md-offset-5">
        <a href="/produk/tambah" class="btn btn-primary">
          Tambah Produk
        </a>
      </div><br>
    </div>
    </div>
    <div class="row">
      @foreach($view as $data)
  <div class="col-xs-6 col-md-3">
    <a href="{{url('/produk/'.$data->slug_produk)}}" class="thumbnail">
      <img src="{{url('/gambar/'.$data->foto_produk)}}" alt="barang">
    </a>
    <h4>{{$data->nama_produk}}</h4>
    {{$data->harga}}
  </div>
@endforeach
		</div>
</div>
@endsection
