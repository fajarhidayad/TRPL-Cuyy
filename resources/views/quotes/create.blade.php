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

    <form method="post"  action = "\quotes">
      <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Tulis Judul Disini">
      </div>
        <div class="form-group">
          <label for="subject">Isi Kutipan</label><br>
          <textarea name="subject" rows="8" cols="80" class="form-control">{{old('subject')}}</textarea>
        </div>


      {{ csrf_field() }}

      <button type="submit" name="button" class="btn btn-default float-right" >Submit Kutipan</button>
    </form>
</div>
@endsection
