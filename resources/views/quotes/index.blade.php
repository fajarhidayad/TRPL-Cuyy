@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('msg'))
      <div class="alert alert-success">
        <p>{{session('msg')}}</p>
      </div>
    @endif

    <div class="row">
      <div class="col-md-5 col-md-offset-5">
        <!-- <a href="/quotes/random" class="btn btn-primary">
          Random
        </a> -->
        <a href="/quotes/create" class="btn btn-primary">
          Create
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <?php foreach ($quotes as $quote): ?>
        <div class="col-md-4">
          <div class="thumbnail">
            <div class="caption">{{ $quote->title}}</div>
            <p><a href="/quotes/{{$quote->slug}}" class="btn btn-primary">Lihat Kutipan</a> </p>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

</div>
@endsection
