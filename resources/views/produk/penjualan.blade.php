@extends('layouts.atas')

@section('content')
<style type="text/css">
.file {
  position: relative;
  overflow: hidden;
}
.iform {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
</style>
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif; color: salmon; ">
<div class="container" style="width: 1200px; height: auto; margin: auto; padding: 10px; background-color: rgba(0,0,0,0.5); font-size: 20px;">
  <h1> <center> Penjualan </center></h1>
  <p><center> Detail penjualan. </center></p>

  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nama Pembeli</th>
        <th>Nama Produk</th>
        <th>Alamat</th>
        <th>Input Resi</th>

      </tr>
    </thead>
    <tbody>
     @foreach($toko as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->nama_produk}}</td>
        <td>{{$user->alamat}}</td>
        <form method="" action="">
          <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>&nbsp; {{csrf_field()}}</form></td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
  
</div>
<script>
document.getElementById("upload").onchange = function() {
  document.getElementById("form").submit();
}
</script>
@endsection
