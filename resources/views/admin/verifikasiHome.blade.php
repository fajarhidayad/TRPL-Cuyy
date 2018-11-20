@extends('layouts.atasadmin')

@section('content')
<style>
  *{
      font-family: 'Montserrat', sans-serif;
    }
    
    .container {
      margin-top: 200px;
    }
    body{
      background-color:#eaeaea;
    }
    .header{
      height: 500px;
      background:linear-gradient(#FDB674,#fcbd83,whitesmoke);
    }
     a{
      text-decoration: none;
      font-weight: bold;
      font-size: 15px;
      color: #FDB674;
    }
    .container-fluid {
      background-color: white;
    }
    .thumbnail {
      text-align: center;
    }
</style>
</head>

  <div class="container">
    <h3>Selamat Datang</h3><br>
  <div class="row">
  <div class="col-xs-6 col-md-4">
    <a href="verifikasi/daftar-pembayaran" class="thumbnail">
      Pembayaran
    </a>
  </div>
  <div class="col-xs-6 col-md-4">
    <a href="admin/lelang" class="thumbnail">
      Top-Up Saldo
    </a>
  </div>
  <div class="col-xs-6 col-md-4">
    <a href="admin/list-pengguna" class="thumbnail">
      <img src="adminn/buyer.png" alt="...">
    </a>
  </div>
</div>

</div>


@endsection