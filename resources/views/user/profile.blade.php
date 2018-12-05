@extends('layouts.atas')

@section('content')
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif;">
<div class="container" style="margin-left: 40px; !important">
    <h1 style="color: salmon; font-size: 50px;">Selamat Datang, {{Auth::user()->name}}</h1><br><br>
    <div class="row">  

        <div class="col-xs-6 col-md-3">
    		<a href="/produk">
      		<img src="produkku.png" alt="giftbox">
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="/penjualan">
      		<img src="wallet.png" alt="wallet">
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="event/lelang">
      		<img src="adminn/auction.png" alt="auction">
    		</a>
  		</div>
  		<div class="col-xs-6 col-md-3">
    		<a href="pengaturan-toko">
      		<img src="profiltoko.png" alt="setting">
    		</a>
  		</div>
    </div>
</div>
@endsection
