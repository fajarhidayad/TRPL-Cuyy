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
<body>


  <div class="container">
  <h1>Daftar User</h1>
          
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>E-mail</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>No Hp</th>
        <th>Foto</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($users as $user)
        
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->alamat}}</td>
          <td>{{$user->jenis_kelamin}}</td>
          <td>{{$user->tanggal_lahir}}</td>
          <td>{{$user->telepon}}</td>
          <td>{{$user->foto}}</td>
          <td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>
        </tr>
      @endforeach

      
    </tbody>
    {{$users->links()}}
  </table>
</div>

</body>
@endsection