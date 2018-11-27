@extends('layouts.atas')

@section('content')
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif;">
<div class="container" style="width: 950px; margin: auto; color: salmon;">
    <h1 style="font-size: 50px;">Selamat Datang, {{$user->name}}</h1>
       <h2>Kelola informasi profil Anda</h2>
    <hr><br>
    <div class="row" style="width: 950px; margin: auto; height: 350px; padding: 10px; margin: 0px auto; background-color: rgba(0,0,0,0.5); font-size: 20px;">
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
        <div class="col-md-8">
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
        <div class="">
          @if($user->foto == "")
          <img src="/fotoprofil/picture.png" style="width: 150px; height: 150px" alt="Foto Profil"/><br>
          
          @else
          <img src="/fotoprofil/{{$user->foto}}" style="width: 150px; height: 150px"  alt="Foto Profil"/>
          @endif
          <div class="row" style="float:right; margin-top: 120px;">
      <a href="ubah-profile" class="btn btn-primary" style="color:white">Ubah</a>
    </div>
        </div>
      </div>
    </div>
    
</div>
@endsection
