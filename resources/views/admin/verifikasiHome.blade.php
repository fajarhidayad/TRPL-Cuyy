@extends('layouts.atasadmin')

@section('content')
<style>
  *{
      font-family: 'Montserrat', sans-serif;
    }
    
    .container {
      margin-top: 80px;
      color:  #FFA07A;
    }
    body{
      
      background-image: url(admins/bgadmin.png);
      background-size: cover;
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
   <center> <img src="{{asset('admins/haiadmin.png')}}"> </center><br>
  <div class="row">
  <div class="col-xs-6 col-md-6 thumbnail" style="border:0;">
    <a href="verifikasi/daftar-pembayaran">
       <img src="{{asset('adminn/adminn.png')}}" alt="...">
    </a>
  </div>
  <div class="col-xs-6 col-md-6">
    <a href="admin/lelang" class="thumbnail" style="border:0;">
        Top Up Saldo
    </a>
  </div>

</div>

</div>


@endsection