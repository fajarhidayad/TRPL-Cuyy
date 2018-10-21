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

    <form method="post" enctype="multipart/form-data"  action="/buat-toko">
      <div class="form-group">
        <label for="fototoko">Foto Toko</label>
        <input type="file" accept="image/*" class="form-control" name="fototoko" placeholder="Nama Toko">
      </div>
      <div class="form-group">
        <label for="toko">Nama Toko</label>
        <input type="text" class="form-control" name="toko" placeholder="Nama Toko">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Toko</label>
        <input type="text" class="form-control" name="alamat" placeholder="Alamat Toko">
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" name="telepon" placeholder="Telepon">
      </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Toko</label><br>
          <textarea name="deskripsi" rows="8" cols="80" class="form-control"></textarea>
        </div>


      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-default float-right" >Buat Toko</button>
    </form>
</div>
@endsection
