@extends('layouts.atasadmin')

@section('content')
<style>
  *{
      font-family: 'Montserrat', sans-serif;
    }
    
    .container {
      margin-top: 80px;
    }
    body{
      
      background-image: url(adminn/bgadmin.png);
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
  <div class="container">
  <h1>Daftar Pembayaran User</h1>
    <div class="row">
    <div class="col-md-6 btn btn-info">
      Belum Terverifikasi
    </div>
    <!-- <div class="col-md-2"></div> -->
    <div class="col-md-6 btn btn-info">
      Terverifikasi
    </div>
  </div><br>
  <table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Alamat</th>
        <th>Bukti</th>
        <th>Action</th>


      </tr>
    </thead>
    <tbody>
      
      @foreach($users as $user)
        
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->nama_produk}}</td>
          <td>{{$user->harga}}</td>
          <td>{{$user->jumlah}}</td>
          <td>a</td>
          <td>{{$user->alamat}}</td>
          <td><a href="{{url('/buktitransfer/'.$user->buktitransfer)}}">{{$user->buktitransfer}}</a></td>
          <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
        </tr>
      @endforeach

      
    </tbody>
    
  </table>
</div>

@endsection