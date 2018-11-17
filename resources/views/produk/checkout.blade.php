@extends('layouts.atas')

@section('content')
    <div class="container">
  <h1>Checkout Barang</h1>

  <h3>Nama Produk : {{$check->nama_produk}}</h3>
  <h5>Jumlah yang dipesan : {{$check->jumlah}}</h5>
  <h5>Harga : Rp. {{$check->harga}}</h5>
  <h5>Alamat Pembeli : {{$alamat->alamat}}</h5>
  <h5>Gambar : </h5>

  <h3>Total Harga : {{$total->total}}</h3>
  @if($check->alamat!='')
  <button type="button" onclick="window.location.href='/bayar/{{$check->idkeranjang}}'" class="btn btn-success">Bayar</button>
  @else
  <p>Tidak dapat melakukan pembelian. Harap isi alamat melalui menu profile.</p>
  <button type="button" class="btn btn-danger">Tidak dapat membeli</button>
  @endif
</div>
@endsection
