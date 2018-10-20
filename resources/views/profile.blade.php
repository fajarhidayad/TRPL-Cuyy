@extends('layouts.atas')

@section('content')
<div class="container">
    <h1>Selamat Datang, {{$user->name}}</h1>
    <h3>Profil</h3>
    <h4>Kelola informasi profil Anda</h4>
    <hr><br>
    <div class="row">
      Nama = {{$view->name}}
    </div>
</div>
@endsection
