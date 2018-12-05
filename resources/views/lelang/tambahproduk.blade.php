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
  <h1>Tambah produk</h1>
  <form method="POST" enctype="multipart/form-data" action="{{url('event/lelang/tambah')}}">
    <div class="form-group">
      <label for="title">Nama Produk</label>
      <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk')}}" placeholder="Tulis Nama Produk Disini" required>
    </div>
    <div class="form-group">
      <label for="harga">Harga Awal</label><br>
      <input type="number" name="harga_awal" class="form-control" value="{{old('harga')}}" placeholder="Harga" required>
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi Produk</label>
      <textarea name="deskripsi" rows="8" cols="80" class="form-control">{{old('deskripsi')}}</textarea>
    </div>
    <div class="form-group">
      <label for="foto">Masukan Gambar</label><br>
      <input type="file" name="foto" value="" required> File Type .jpeg, .bmp, .png
    </div>

    {{ csrf_field() }}

    <button type="submit" name="button" class="btn btn-primary float-right" >Tambah</button>
  </form>
</div>
@endsection
