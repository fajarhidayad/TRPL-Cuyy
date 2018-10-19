<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Kerajinan.id</a>
      </div>
      <ul class="nav navbar-nav">
        @if (Route::has('login'))
                @auth

        <li><a href="{{ url('/home') }}">Home</a></li>
        @endauth
        @endif
        <li><a href="#"><li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li></a></li>
      </ul>

      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Cari Disini" name="search">
        </div>
        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true">Cari</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if (Route::has('login'))
                @auth
                  <!-- <li><a href="{{ url('/home') }}">Home</a></li> -->
                @else
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
        @endif
      </ul>
    </div>
  </nav>


  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src=" desk.jpg" alt="Los Angeles" style="width:100%;">
        </div>

        <div class="item">
          <img src=" loft.jpg" alt="Chicago" style="width:100%;">
        </div>

        <div class="item">
          <img src=" meeting.jpg" alt="New york" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><br>
    <div class="row">
      <h4>Barang Baru</h4>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src=" minibus.jpg" alt="barang1">
          <div class="caption">
          <h3>Tongkat Kayu</h3>
          
          <p><a href="#" class="btn btn-primary" role="button">Beli</a> <a href="#" class="btn btn-default" role="button">Detail</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src=" minibus.jpg" alt="barang2">
          <div class="caption">
          <h3>Kaligrafi</h3>

          <p><a href="#" class="btn btn-primary" role="button">Beli</a> <a href="#" class="btn btn-default" role="button">Detail</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src=" minibus.jpg" alt="barang3">
          <div class="caption">
          <h3>Tasbih</h3>

          <p><a href="#" class="btn btn-primary" role="button">Beli</a> <a href="#" class="btn btn-default" role="button">Detail</a></p>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-default">
    <p class="navbar-text">&copy 2018 Kerajinan.id</p>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"> Hak Cipta Dilindungi <span class="glyphicon glyphicon-lock"></span></a></li>
      </ul>
  </nav>

  </div>
    </body>
</html>
