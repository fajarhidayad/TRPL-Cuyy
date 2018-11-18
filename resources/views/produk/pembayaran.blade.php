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
        @if(Auth::User()->level==1)
        <th>Nama Pembeli</th>
        @endif
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
      @foreach($view as $data)
      <tr>
        @if(Auth::User()->level==1)
        <td>{{$data->name}}</td>
        @endif
        <td>{{$data->nama_produk}}</td>
        <td>{{$data->jumlah}}</td>
        <td>Rp. {{$data->harga}}</td>
        <td>{{$data->alamat}}</td>
        <td>@if($data->buktitransfer=='')Belum ada data @else <a href="">{{$data->buktitransfer}}</a>@endif</td>
        <td>
          <button type="button" onclick="window.location.href='/produk/{{$data->slug_produk}}'" class="btn btn-info" title="Lihat Produk"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

          @if(Auth::User()->level!=1)

          <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/'.$data->idpembayaran)}}">
            @if($data->statuspembayaran!=0)
              
            @else
            <div class="file btn btn-primary">
                Upload Bukti
                <input class="iform" id="upload" type="file" name="buktipembayaran" required>
              </div>
             {{csrf_field()}}

            <button type="submit" class="btn btn-success" title="Checkout Barang" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>

            @endif        
          </form>
          @endif
        </td>
        <td>@if($data->statuspembayaran==0)
          Silahkan Upload Bukti Transfer
          @elseif($data->statuspembayaran==2)
          Proses Verifikasi
          @else
          Barang Sedang Dikemas
          @endif
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  <!-- <h3>Total Harga : {{$total->total}}</h3> -->
	<!-- <button type="button" class="btn btn-success">Bayar</button> -->
</div>
<script>
document.getElementById("upload").onchange = function() {
    document.getElementById("form").submit();
}
</script>
@endsection
