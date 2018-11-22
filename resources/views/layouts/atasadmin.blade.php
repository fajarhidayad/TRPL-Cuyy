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
  <a class="navbar-brand" href="{{ url('/admin') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Kerajinan.id</a>
</div>

<ul class="nav navbar-nav navbar-right" style="">
  @if (Route::has('login'))

@endif
  <!-- <a class="nav-link" href="/profile">{{ __('Profile') }}</a> -->
  <li class="dropdown">
    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{Auth::user()->name}}
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="/admin">Home</a></li>
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

        <!-- <main class=""> -->
            
    </div>
    @yield('content')
        <!-- </main> -->

         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script');

</body>
</html>
