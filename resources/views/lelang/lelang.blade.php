@extends('layouts.atasadmin')

@section('content')
<style>
  *{
      font-family: 'Montserrat', sans-serif;
    }
    h2 {
      margin-top: 150px;
      text-align: center;
      font-weight: bold;
      font-size: 25px;

    }
    .container {
      margin-top: 0px;
      
    }
    body{
      background-color: white;    
    }
    

    .header{
      height: 500px;
      
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
<body>

  <div class="container">
  	<h2>Lelang</h2><br>
        <div class="row">
  <div class="col-md-3">
    <a href="tambahlelang" class="btn btn-primary">Tambah Event Lelang</a>
  </div>
</div>
</div>

</body>
@endsection