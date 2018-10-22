@extends('layouts.atas')

@section('content')


<div class="container">
    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->
    <div class="container">
      <div class="row">

    </div>
    </div>
    <div class="row">

  <div class="col-xs-6 col-md-3">
    <a href="{{url('/produk/'.$view->slug_produk)}}" class="thumbnail">
      <img src="{{url('/gambar/'.$view->foto_produk)}}" alt="barang" style="width:300px;height:300px">
    </a>
    <h4>{{$view->nama_produk}}</h4>
    {{$view->harga}}<br><br>

    <button type="button" name="button" class="btn btn-primary">Beli</button>
    <button type="button" name="button" class="btn btn-primary">Tambah Ke Keranjang</button>
    @if($toko->user_id==Auth::user()->id)
    <a href="/produk/ubah/{{$view->slug_produk}}" class="btn btn-primary">Ubah</a>
    @endif
  </div>


		</div>
</div>
@endsection
