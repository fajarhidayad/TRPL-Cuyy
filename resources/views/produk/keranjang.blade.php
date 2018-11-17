@extends('layouts.atas')

@section('content')
<div class="container">
  <h2>Keranjang Belanja</h2>
  <p>Masukkan ke keranjang untuk memilih barang lainnya.</p>
  @if(count($view)==null)
  Tidak ada Barang di Keranjang Belanja
  @else
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Jumlah Produk</th>
        <th>Harga</th>
        <th>Alamat</th>
        <th>Gambar</th>
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
        <td>Gambar</td>
        <td>
          <button type="button" onclick="window.location.href='/produk/{{$data->slug_produk}}'" class="btn btn-info" title="Lihat Produk"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button> 

          <button type="button" class="btn btn-danger" title="Hapus Data" onclick="window.location.href='/hapusbarang/{{$data->idkeranjang}}'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          
          <button type="button" class="btn btn-success" title="Checkout Barang" onclick="window.location.href='/alamat_pembayaran/{{$data->idkeranjang}}'"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  <h3>Total Harga : {{$total->total}}</h3>
	<button type="button" class="btn btn-success">Bayar</button>
</div>

@endsection
