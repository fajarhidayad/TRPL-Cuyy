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
    <form method="POST" enctype="multipart/form-data" action="{{url('produk/tambah')}}">
      <div class="form-group">
        <label for="title">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk')}}" placeholder="Tulis Nama Produk Disini">
      </div>
        <div class="form-group">
          <label for="harga">Harga</label><br>
          <input type="number" name="harga" class="form-control" value="{{old('harga')}}" placeholder="Harga">
        </div>
        <div class="form-group">
          <label for="stok">Stok Barang</label>
          <input type="number" name="stok" class="form-control" value="{{old('stok')}}" placeholder="Stok">
        </div>
        <div class="form-group">
          <label for="berat">Berat Barang</label>
          <input type="number" name="berat" class="form-control" value="{{old('berat')}}" placeholder="Berat Barang">
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label><br>
            <input type="checkbox" name="kategori" value="Pria"> Pria<br>
            <input type="checkbox" name="kategori" value="Anak-anak"> Anak-anak<br>
            <input type="checkbox" name="kategori" value="Aksesoris"> Aksesoris <br>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Produk</label>
          <textarea name="deskripsi" rows="8" cols="80" class="form-control">{{old('deskripsi')}}</textarea>
        </div>
        <div class="form-group">
          <label for="">Kondisi Barang</label><br>
          <fieldset id="group2">
          <input type="radio" name="kondisi" value="Baru"> Baru<br>
          <input type="radio" name="kondisi" value="Bekas">Bekas<br>
        </fieldset>
        </div>
        <div class="form-group">
          <label for="foto">Masukan Gambar</label><br>
          <input type="file" name="foto" value="">
        </div>

      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-primary float-right" >Tambah</button>
    </form>
</div>
@endsection
