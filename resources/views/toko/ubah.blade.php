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

    <form method="post" enctype="multipart/form-data"  action="/pengaturan-toko/ubah">
      <div class="form-group">
        <label for="fototoko">Foto Toko</label>
        <input type="file" accept="image/*" class="form-control" name="fototoko" placeholder="Nama Toko">
      </div>
      <div class="form-group">
        <label for="toko">Nama Toko</label>
        <input type="text" class="form-control" name="toko" value="{{ $toko->nama_toko }}">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Toko</label>
        <input type="text" class="form-control" name="alamat" value="{{ $toko->alamat_toko }}">
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" name="telepon" value="{{ $toko->telepon }}">
      </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Toko</label><br>
          <textarea name="deskripsi" rows="8" cols="80" class="form-control">{{ $toko->deskripsi }}</textarea>
        </div>


      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-default float-right" >Buat Toko</button>
    </form>
</div>
@endsection
