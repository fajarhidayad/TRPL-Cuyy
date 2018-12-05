@extends('layouts.atas')

@section('content')

<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif;">
<div class="container" style="width: 950px; margin: auto; color: salmon;">
    <h1 style="font-size: 50px;">Topup Saldo</h1>
       <h2>Silahkan pilih nominal saldo</h2>
    <hr><br>
    <div class="row" style="width: 950px; margin: auto; height: 350px; padding: 10px; margin: 0px auto; background-color: rgba(0,0,0,0.5); font-size: 20px; position: relative;">
      
      <div style="position:absolute; top:50%; left:50% ;transform:translate(-50%,-50%);">
      	<a href="topup/100000" class="btn btn-primary">Rp 100.000</a>
      	<a href="topup/250000" class="btn btn-primary">Rp 250.000</a>
      	<a href="topup/500000" class="btn btn-primary">Rp 500.000</a>
      	<a href="topup/1000000" class="btn btn-primary">Rp 1.000.000</a>
      </div>
    </div>
    
</div>

@endsection