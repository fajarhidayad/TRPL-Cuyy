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
<div class="container">
  <h2>Pembayaran</h2>
  <p>Lanjutkan pembayaran atau lihat detail pembelian.</p>
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
