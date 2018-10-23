@extends('layouts.atas')

@section('content')


<div class="container">
    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->

    <div class="container">
  <h1>Checkout Barang</h1>

  <h3>Nama Produk : {{$check->nama_produk}}</h3>
  <h5>Jumlah yang dipesan : {{$check->jumlah}}</h5>
  <h5>Harga : Rp. {{$check->harga}}</h5>
  <h5>Alamat Pembeli : {{$check->alamat}}</h5>
  <h5>Gambar : </h5>

  <h3>Total Harga : {{$total->total}}</h3>
  <button type="button" class="btn btn-success">Bayar</button>


</div>
@endsection
