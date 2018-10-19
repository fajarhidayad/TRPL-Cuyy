@extends('layouts.app')

@section('content')
@if (session('msg'))
  <div class="alert alert-success">
    <p>{{session('msg')}}</p>
  </div>
@endif

<div class="container">
  <div class="jumbotron">
    <h1>{{$quote->title}}</h1>
    <p>{{$quote->subject}}</p>
    <p>Ditulis Oleh: <a href="/profile/{{$quote->user->id}}"> {{$quote->user->name}}</a></p>

    <p><a href="/quotes" class="btn btn-primary btn-lg">Kembali</a> </p>

    @if($quote->isOwner())
      <p><a href="/quotes/{{$quote->id}}/edit" class="btn btn-primary btn-lg">Edit</a> </p>
      <form method="POST"  action = "/quotes/{{$quote->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" >Hapus</button>
      </form>
    @endif
  </div><br>
  <p>Kolom Komentar</p><hr>
  <?php foreach ($quote->comments as $comment): ?>
    <div class="row">
      <div class="col-md-4">
        <p>{{$comment->subject}}</p>
        <p>Ditulis Oleh: <a href="/profile/{{$comment->user->id}}"> {{$comment->user->name}}</a></p>
      </div>

        @if($comment->isOwner())
        <div class="col-md-2">
          <a href="/quotes-comment/{{$comment->id}}/edit" class="btn btn-primary btn-lg">Edit</a>
        </div>
        <div class="col-md-2">
          <form method="POST"  action = "/quotes-comment/{{$comment->id}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" >Hapus</button>
          </form>
        </div>
          @endif
          <hr>
    </div><hr>
  <?php endforeach; ?>


  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="" action="/quotes-comment/{{$quote->id}}" method="post">
    <div class="form-group">
      <label for="subject">Isi Komentar</label>
      <textarea name="subject" class="form-control" rows="8" cols="80">{{old('subject')}}</textarea>
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary float-right" >Submit Komentar</button>
  </form>
</div><br>
@endsection
