@extends('layouts.atas')

@section('content')
<div class="container">
    <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br>
    <div class="row">

      

        <div class="col-xs-6 col-md-3">
    		<a href="/produk" class="thumbnail">
      		<img src="{{url('/giftbox.png')}}" alt="giftbox"><br>Produkku
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="#" class="thumbnail">
      		<img src="wallet.png" alt="wallet"><br>Penjualan Saya
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="#" class="thumbnail">
      		<img src="auction.png" alt="auction"><br>Lelang
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="#" class="thumbnail">
      		<img src="setting.png" alt="setting"><br>Pengaturan
    		</a>
  		</div>
    </div>
</div>
@endsection
