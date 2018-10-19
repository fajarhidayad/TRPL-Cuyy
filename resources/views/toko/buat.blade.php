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

    <form method="post"  action = "\produk">
      <div class="form-group">
        <label for="toko">Nama Toko</label>
        <input type="text" class="form-control" name="toko" value="{{old('title')}}" placeholder="Nama Toko">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Toko</label>
        <input type="text" class="form-control" name="alamat" value="{{old('title')}}" placeholder="Alamat Toko">
      </div>
      <div class="form-group">
        <label for="telpon">Telepon</label>
        <input type="text" class="form-control" name="telpon" value="{{old('title')}}" placeholder="Telepon">
      </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Toko</label><br>
          <textarea name="deskripsi" rows="8" cols="80" class="form-control">{{old('subject')}}</textarea>
        </div>


      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-default float-right" >Buat Toko</button>
    </form>
</div>
@endsection
