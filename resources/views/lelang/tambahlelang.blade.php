@extends('layouts.app')

@section('content')
<div class="container">

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h1>Tambah Event Lelang</h1>
  <form method="POST" enctype="multipart/form-data" action="">
    <div class="form-group">
      <label for="title">Nama Event Lelang</label>
      <input type="text" class="form-control" name="nama_produk" value="" placeholder="Tulis Nama Event">
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi Event</label>
      <textarea name="deskripsi" rows="8" cols="80" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="foto">Masukan Gambar Event Lelang</label><br>
      <input type="file" name="foto" value="">
    </div>

    {{ csrf_field() }}

    <button type="submit" name="button" class="btn btn-primary float-right" >Buat Lelang</button>
  </form>
</div>
@endsection
