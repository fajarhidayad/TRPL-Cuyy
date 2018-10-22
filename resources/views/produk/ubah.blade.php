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
    <h1>Ubah Produk</h1>
    <form method="POST" enctype="multipart/form-data" action="{{url('produk/ubah/'.$view->slug_produk)}}">
      <div class="form-group">
        <img src="/gambar/{{$view->foto_produk}}" class="thumbnail img-responsive center-block" style="width:200px;height:200px"/>
        <label for="title">Foto Produk</label>
      </div>
      <div class="form-group">
        <label for="title">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" value="{{$view->nama_produk}}" placeholder="Tulis Nama Produk Disini">
      </div>
        <div class="form-group">
          <label for="harga">Harga</label><br>
          <input type="number" name="harga" class="form-control" value="{{$view->harga}}" placeholder="Harga">
        </div>
        <div class="form-group">
          <label for="stok">Stok Barang</label>
          <input type="number" name="stok" class="form-control" value="{{$view->stok}}" placeholder="Stok">
        </div>
        <div class="form-group">
          <label for="berat">Berat Barang</label>
          <input type="number" name="berat" class="form-control" value="{{$view->berat}}" placeholder="Berat Barang">
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label><br>
            <input type="checkbox" name="kategori" value="Pria"> Pria<br>
            <input type="checkbox" name="kategori" value="Anak-anak"> Anak-anak<br>
            <input type="checkbox" name="kategori" value="Aksesoris"> Aksesoris <br>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Produk</label>
          <textarea name="deskripsi" rows="8" cols="80" class="form-control">{{$view->deskripsi}}</textarea>
        </div>
        <div class="form-group">
          <label for="">Kondisi Barang</label><br>
          <fieldset id="group2">
          <input type="radio" name="kondisi" value="Baru" @if(old('kondisi',$view->kondisi_barang)=="Baru") checked @endif> Baru<br>
          <input type="radio" name="kondisi" value="Bekas" @if(old('kondisi',$view->kondisi_barang)=="Bekas") checked @endif>Bekas<br>
        </fieldset>
        </div>
        <div class="form-group">
          <label for="foto">Masukan Gambar</label><br>
          <input type="file" accept="image/*" name="foto" value="">
        </div>

      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-primary float-right" >Ubah Produk</button>
    </form>
</div>
@endsection
