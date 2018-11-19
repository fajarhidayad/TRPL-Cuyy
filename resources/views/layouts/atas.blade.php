<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kerajinan.id') }}</title>
    <link rel="shortcut icon"  href="logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <!-- <div id="app"> -->
      <nav class="navbar navbar-default" >
<div class="container-fluid">
<div class="navbar-header">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="img/icon.png" style="width: 100px; height: 30px;"></a>
</div>
<ul class="nav navbar-nav">
  @if (Route::has('login'))
          @auth

  <li><a href="{{ url('/') }}">Home</a></li>
  @endauth
  @endif
  <li >
    <a href="#">
      <li><a href="/keranjang"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
    </a>
  </li>
</ul>

<form class="navbar-form navbar-left" action="/action_page.php">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Cari Disini" name="search">
  </div>
  <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true">Cari</button>
</form>
<ul class="nav navbar-nav navbar-right" style="">
  @if (Route::has('login'))
          @auth
            <!-- <li><a href="{{ url('/home') }}">Home</a></li> -->
            <li><a href="{{url('jual')}}">Jual</a> </li>
          @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          @endauth

@endif
  <!-- <a class="nav-link" href="/profile">{{ __('Profile') }}</a> -->
  <li class="dropdown">
    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{Auth::user()->name}}
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="/profile">{{ __('Profile') }}</a> </li>
        <li><a href="/pembayaran">Pembayaran</a> </li>
        <li><a href="#">Pesanan</a> </li>
        <li class="divider"></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a> </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </ul>
  </li>

</ul>
</div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
