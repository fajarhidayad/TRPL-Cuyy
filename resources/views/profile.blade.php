@extends('layouts.atas')

@section('content')
<div class="container">
    <h1>Selamat Datang, {{$user->name}}</h1>
    <h3>Profil</h3>
    <h4>Kelola informasi profil Anda</h4>
    <hr><br>
    <div class="row">
      <div class="col-md-9">
        <div class="col-md-4">
          <label for="nama" class="" >Nama</label> <br>
          <label for="">Alamat</label><br>
          <label for="">Jenis Kelamin</label><br>
          <label for="">Tanggal Lahir</label><br>
          <label for="">Telepon</label><br>
          <label for="">E-mail</label><br>
          <label for="">Sosial Media</label><br>
          <label for="">Kartu Kredit/Rekening</label><br>

        </div>
        <div class="col-md-5">
          :&#09;<label for="nama" class="" >{{$user->name}}</label> <br>
          :&#09;<label for=""> {{$user->alamat}}</label><br>
          :&#09;<label for=""> {{$user->jenis_kelamin}}</label><br>
          :&#09;<label for=""> {{$user->tanggal_lahir}}</label><br>
          :&#09;<label for=""> {{$user->telepon}}</label><br>
          :&#09;<label for=""> {{$user->email}}</label><br>
          :&#09;<label for=""> {{$user->sosmed}}</label><br>
          :&#09;<label for=""> {{$user->kartu_kredit}}</label><br>

        </div>
        <div class="">

        </div>
      </div>
      <div class="col-md-2">
        <div class="jumbotron">
          <img src="/fotoprofil/{{$user->foto}}" alt="Foto Profil"/>
        </div>
      </div>
    </div>
    <div class="row" style="float:right;">
      <button type="button" name="button" class="btn btn-primary"><a href="ubah-profile" style="color:white">Ubah</a> </button>
    </div>
</div>
@endsection