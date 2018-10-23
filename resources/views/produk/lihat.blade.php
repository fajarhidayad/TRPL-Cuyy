@extends('layouts.atas')

@section('content')
    <!-- <h1>Selamat Datang, {{Auth::user()->name}}</h1><br><br> -->
    <style type="text/css">
      	.detail {
      		margin-top: 100px;
      		width: 70%;
      		background-color: #f9e4c7;
      		padding: 30px;
          border-radius:4px;
      	}
      </style>
    <div class="container detail">
      <div class="row">
      		<div class="col-sm-4">
      			<img src="{{url('/gambar/'.$view->foto_produk)}}" alt="gambar" class="img-responsive thumbnail"><br><br>
      			<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Kunjungi Toko</button>
      		</div>
      		<div class="col-sm-1"></div>
      		<div class="col-sm-7">
      			<h1>{{$view->nama_produk}}</h1>
      			<h3>Rp.{{$view->harga}}</h3><br>
      			<h4>Deskripsi Produk</h4>
      			<p>{{$view->deskripsi}}</p>
      			<br>
            <form method="post" action="/masukkeranjang/{{$view->id_produk}}">
              {{ csrf_field() }}
      				<label id="jumlah">Jumlah Barang</label><br>
              @if($view->stok==0)
              <a class="btn btn-danger btn-block" >Stok Kosong</a>
              @elseif($view->stok>0)
              <input type="number" min="1" max="{{$view->stok}}" class="form-control" name="jumlahbarang" placeholder="Jumlah barang yang ingin dibeli" required/>
              @endif
      			<br>
      		<div class="btn-group">
        			<button type="submit" class="btn btn-warning" @if($view->stok==0) disabled @endif>Beli Sekarang</button>
      			<button type="submit" class="btn btn-info" @if($view->stok==0) disabled @endif><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Tambah ke Keranjang</button>
            @if($toko->user_id==Auth::user()->id)
            <a href="/produk/ubah/{{$view->slug_produk}}" class="btn btn-primary">Ubah</a>
            @endif
      		</div>
          </form>

      		</div>
      	</div>

</div>
@endsection
