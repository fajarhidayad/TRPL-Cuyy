@extends('layouts.atas')

@section('content')
    <div class="container">
  <h1>Topup Saldo</h1>

  <h3>Nama  : {{$users->name}}</h3>
  <h5>Jumlah Topup : {{$saldo}}</h5>
  <h5>Harga : Rp. {{$saldo}}</h5>

  <a href='bayar/{{$saldo}}' class="btn btn-success">Bayar</a>
  {{-- <button type="button" onclick="window.location.href='" class="btn btn-success">Transfer Ke Rekening Admin</button> --}}

</div>
@endsection
