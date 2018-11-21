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
      background-color:#eaeaea;
      background-image: url(adminn/bgadmin.png);
      background-size: cover;
    }
    .header{
      height: 500px;
      background:linear-gradient(#FFA07A,#fcbd83,whitesmoke);
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
   <center> <img src="adminn/haiadmin.png"> </center>
    <h3></h3><br>
  <div class="row">
  <div class="col-xs-6 col-md-4" style="color:  #FFA07A">
    <a href="/admin/verifikasi"  >
      <img src="adminn/adminn.png" alt="...">
      
  </div>
  <div class="col-xs-6 col-md-4">
    <a href="admin/lelang" >
      <img src="adminn/auction.png" alt="...">
     
    </a>
  </div>
  <div class="col-xs-6 col-md-4">
    <a href="admin/list-pengguna" >
      <img src="adminn/buyer.png" alt="...">
      
    </a>
  </div>
</div>

</div>


@endsection