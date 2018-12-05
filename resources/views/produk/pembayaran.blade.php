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
#produk{
  width:100%;
}
#saldo{
  display: none;
  width: 100%;
}
</style>
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif; color: salmon; ">
  <div class="container" style="width: 1200px; height: auto; margin: auto; padding: 10px; background-color: rgba(0,0,0,0.5); font-size: 20px;">
    <h1> <center> Pembayaran </center></h1>
    <p><center> Lanjutkan pembayaran atau lihat detail pembelian. </center></p>
    
    <div class="row">
      <div id="button-produk" class="col-md-6 btn btn-info">
       ({{ $jumlah }}) Pembayaran Produk
      </div>
      <div id="button-saldo" class="col-md-6 btn btn-info">
       ({{ $jumlahsaldo }}) Pembayaran Saldo
      </div>
    </div>
    <hr>

    @if(count($view)==null)
    Tidak ada Barang dalam Pembayaran
    @else
    <table id="produk" class="table table-condensed">
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
          <td>{{$data->alamat}}, {{$data->kelurahan}}, {{$data->kecamatan}}, {{$data->kabupaten}}, {{$data->provinsi}}</td>
          <td>@if($data->buktitransfer=='')Belum ada data @else <a href="{{url('/buktitransfer/'.$data->buktitransfer)}}">{{$data->buktitransfer}}</a>@endif</td>
          <td>
            <button type="button" onclick="window.location.href='/produk/{{$data->slug_produk}}'" class="btn btn-info" title="Lihat Produk"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

            @if(Auth::User()->level!=1)

              @if($data->statuspembayaran!=0)
              
              @else
              <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/'.$data->idpembayaran)}}">
              @csrf
              <div class="file btn btn-primary">
                Upload Bukti
                <input class="iform" id="upload" type="file" name="buktipembayaran" required>
              </div>
              

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

    <table id="saldo" class="table">
      <thead>
        <tr>
          <th>Jumlah</th>
          <th>Bukti</th>
          <th>Action</th>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>

        @foreach($pembayaran as $saldo)

        <tr>
          <td>{{$saldo->jumlah}}</td>
          @if ($saldo->bukti != "")
          <td>{{$saldo->bukti}}</td>
          @else
          <td>Tidak Ada</td>
          <td>
          @endif
          <form enctype="multipart/form-data" id="form1" method="post" action="{{url('buktisaldo/'.$saldo->id_pembayaran)}}">
            @csrf
              @if($saldo->status!=0)
              
              @else
              <div class="file btn btn-primary">
                Upload Bukti
                <input class="iform" id="uploadsaldo" type="file" name="buktisaldo" required>
              </div>
              <button style="display: none;" type="submit" class="btn btn-success" title="Checkout Barang" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>

              @endif        
            </form></td>
            @if ($saldo->status == 0)
            <td>Slahkan Upload Bukti</td>
            @elseif($saldo->status == 1)
            <td>Dalam Proses</td>
            @else
            <td>Selesai</td>
            @endif
            
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    {{-- <script>
    
    </script> --}}
    @endsection

    @section('script')
    <script type="text/javascript">
    document.getElementById("upload").onchange = function() {
      document.getElementById("form").submit();
    }

    document.getElementById("uploadsaldo").onchange = function() {
      document.getElementById("form1").submit();
    }

    $('#button-produk').click(function() {
      $('#produk').css({
       'display' : 'table',
       'width' : '100%'});
      $('#saldo').css({
       'display' : 'none',
       'width' : '100%'});
    });

    $('#button-saldo').click(function() {
      $('#produk').css({
       'display' : 'none',
       'width' : '100%'});
      $('#saldo').css({
       'display' : 'table',
       'width' : '100%'});
    });

  </script>
  @endsection
