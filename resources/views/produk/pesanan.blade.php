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
  <h1> <center> Pesanan </center></h1>
  <p><center> Detail pesanan. </center></p>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nama Pembeli</th>
        <th>Nama Produk</th>
        <th>Jumlah Produk</th>
        <th>Harga</th>
        <th>Alamat</th>
        <th>Bukti Verifikasi</th>
        <th>Action</th>
        <th>Verifikasi</th>

      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
  
</div>
<script>
document.getElementById("upload").onchange = function() {
  document.getElementById("form").submit();
}
</script>
@endsection
