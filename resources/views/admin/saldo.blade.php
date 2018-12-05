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
#sudah{
  display: none;
  width: 100%;
}
#belum{
  width: 100%;
}
#bayar{
  display: none;
  width: 100%;
}
</style>
<div class="container">
  <h1>Daftar Pembayaran Saldo</h1>

  <table id="belum" class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Bukti</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($pembayaran as $saldo)
      
      <tr>
        <td>{{$saldo->name}}</td>
        <td>{{$saldo->jumlah}}</td>
        <td><a href="{{url('/buktitransfer/'.$saldo->bukti)}}">{{$saldo->bukti}}</a></td>
        <form method="post" action="{{ url('admin/saldo/'. $saldo->id_pembayaran) }}">
          <td>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>&nbsp; {{csrf_field()}}</form>
          <form method="post" action="{{ url('admin/saldo/hapus/'. $saldo->id_pembayaran) }}">
            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>{{csrf_field()}}
          </td>
          </form>
        </tr>
        @endforeach


      </tbody>

    </table>

</div>

@endsection