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
  <h1>Daftar Pembayaran User</h1>
  <div class="row">
    <div div id="button-bayar" class="col-md-4 btn btn-info">
      Belum Bayar
    </div>
    <div id="button-belum" class="col-md-4 btn btn-info">
      Belum Terverifikasi
    </div>
    <div id="button-sudah" class="col-md-4 btn btn-info" style="float: right;">
      Terverifikasi
    </div>
  </div><br>

  <table id="bayar" class="table">
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
      
      @foreach($user0 as $user)
      
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->nama_produk}}</td>
        <td>{{$user->harga}}</td>
        <td>{{$user->jumlah}}</td>
        <td>a</td>
        <td>{{$user->alamat}}</td>
        <td><a href="{{url('/buktitransfer/'.$user->buktitransfer)}}">{{$user->buktitransfer}}</a></td>
        
      </tr>
      @endforeach

      
    </tbody>
    
  </table>

  <table id="belum" class="table">
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
        <form action="">
          <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>&nbsp;</form><form action="">
          <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
        </form>
      </tr>
      @endforeach

      
    </tbody>
    
  </table>

  <table id="sudah" class="table">
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
      
      @foreach($userverif as $user)
      
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->nama_produk}}</td>
        <td>{{$user->harga}}</td>
        <td>{{$user->jumlah}}</td>
        <td>a</td>
        <td>{{$user->alamat}}</td>
        <td><a href="{{url('/buktitransfer/'.$user->buktitransfer)}}">{{$user->buktitransfer}}</a></td>
        <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>&nbsp;
        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
      </tr>
      @endforeach

      
    </tbody>
    
  </table>
</div>

@endsection

@section('script')
<script type="text/javascript">
$('#button-belum').click(function() {
  $('#belum').css({
   'display' : 'table',
   'width' : '100%'});
  $('#sudah').css({
   'display' : 'none',
   'width' : '100%'});
  $('#bayar').css({
   'display' : 'none',
   'width' : '100%'});
});

$('#button-sudah').click(function() {
  $('#belum').css({
   'display' : 'none',
   'width' : '100%'});
  $('#sudah').css({
   'display' : 'table',
   'width' : '100%'});
  $('#bayar').css({
   'display' : 'none',
   'width' : '100%'});
});

$('#button-bayar').click(function() {
  $('#belum').css({
   'display' : 'none',
   'width' : '100%'});
  $('#sudah').css({
   'display' : 'none',
   'width' : '100%'});
  $('#bayar').css({
   'display' : 'table',
   'width' : '100%'});
});

</script>
@endsection
