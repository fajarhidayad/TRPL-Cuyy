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
  @if(count($view)==null)
  Tidak ada Barang dalam Pembayaran
  @else
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Jumlah Produk</th>
        <th>Harga</th>
        <th>Alamat</th>
        <th>Bukti Verifikasi</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($view as $data)
      <tr>
        <td>{{$data->nama_produk}}</td>
        <td>{{$data->jumlah}}</td>
        <td>Rp. {{$data->harga}}</td>
        <td>{{$data->alamat}}</td>
        <td>@if($data->buktitransfer=='')Belum ada data @else<img src="{{$data->buktitransfer}}" />@endif</td>
        <td>
          <button type="button" onclick="window.location.href='/produk/{{$data->slug_produk}}'" class="btn btn-info" title="Lihat Produk"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
          <button type="button" class="btn btn-success" title="Checkout Barang" onclick="window.location.href='/checkoutproduk/{{$data->idpembayaran}}'"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
          <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/')}}">
                        {{csrf_field()}}
                        <div class="file btn btn-primary">
                          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                          <input class="iform" id="upload" type="file" name="buktipembayaran" accept="image/*" required />
                        </div>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  <h3>Total Harga : {{$total->total}}</h3>
	<button type="button" class="btn btn-success">Bayar</button>
</div>

@endsection
