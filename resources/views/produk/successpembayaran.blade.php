@extends('layouts.atas')

@section('content')
<style type="text/css">
.wes {
    text-align: center;
    margin-top: 50px;
  }
  .wes h1 {
    color: orange;
    font-weight: bold;
  }
</style>
<div class="container">
  <h2>Pembayaran</h2>
<p>Bayar Produk anda agar dapat segera diproses dan dikemas</p>
<div class="wes">
<h3>Transfer Barang anda ke </h3>
<h1>621200981783623723214</h1>
<h2>a.n Rahmad ageng</h2>
</div>

<button type="button" onclick="window.location.href='/pembayaran'" class="btn btn-success">Lihat Pembayaran</button>

</div>

@endsection
