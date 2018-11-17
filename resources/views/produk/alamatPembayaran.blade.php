@extends('layouts.atas')

@section('content')
<div class="container">
  <div class="row">
    <div class="content">
    <ul class="list-inline">
    <li style="color: #D06028"><h2><u><strong> UBAH </strong></h2></u></li>
    <li><h2><strong> Alamat </strong></h2></li>
  </ul>

  <div class="container">
  <form method="POST" action="/checkoutproduk/{{$check->idkeranjang}}">
  <div class="form-group">
    <label for="inputalamat">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat" style="width:64%;" required>
  </div>
  <div class="form-group">
    <label for="inputdesa">Kelurahan</label>
    <input type="text" name="kelurahan" class="form-control" id="inputdesa" placeholder="Keluarahan" style="width:64%;" required>
  </div>
    <div class="form-group">
    <label for="inputkecamatan">Kecamatan</label>
    <input type="text" name="kecamatan" class="form-control" id="inputkecamatan" placeholder="Kecamatan" style="width:64%;" required>
  </div>
  <div class="form-group">
    <label for="inputkabupaten">Kabupaten</label>
    <input type="text" name="kabupaten" class="form-control" id="inputkabupaten" placeholder="Kabupaten" style="width:64%;" required>
  </div>
  <div class="form-group">
    <label for="inputprovinsi">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" id="inputprovinsi" placeholder="Provinsi" style="width:64%;" required>
  </div>
    
     <div class="tombol-submit">
  <button type="button" class="btn btn-primary">Kembali</button>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary" >Lanjut</button>
</form>
</div>
  </div>
</div>


@endsection