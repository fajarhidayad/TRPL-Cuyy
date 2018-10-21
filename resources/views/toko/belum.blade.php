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

    <h1>Anda Belum Buat Toko</h1>

      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-default float-right" onclick="window.location.href='buat-toko'">Buat Toko</button>
    </form>
</div>
@endsection
