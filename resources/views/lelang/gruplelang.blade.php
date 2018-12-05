@extends('layouts.atasadmin')

@section('content')
<style>
*{
  font-family: 'Montserrat', sans-serif;
}
h2 {
  margin-top: 150px;
  text-align: center;
  font-weight: bold;
  font-size: 25px;

}
.container {
  margin-top: 0px;

}
body{
  background-color: white;    
}


.header{
  height: 500px;

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
</style>
</head>
<body>

  <div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}
    </div>
    @endif
    <h2>Event Lelang</h2>
    <h3>Slot Tersisa : {{ $jumlah }}</h3>
    <div class="row">
      <div class="col-md-3">
        <a href="tambah" class="btn btn-primary">Tambah Produk Lelang</a>
      </div>
    </div><br>
    @foreach($isi as $data)
    <div class="col-xs-6 col-md-3">
      <a href="" class="thumbnail">
        <img src="{{url('/gambar/'.$data->foto_produk)}}" alt="barang" style="width:150px;height:150px">
      </a>
      <h4>Nama Produk Lelang : {{ $data->nama_produk }}</h4>
      <h4>Harga Awal : {{ $data->harga_awal }}</h4>
      <h4>{{ $data->deskripsi }}</h4>
      @if ($data->iduser == Auth::user()->id)
        {{-- expr --}}
      @else
      <a href="" class="btn btn-primary">Masuk Event Lelang</a>
      @endif
      
    </div>
    @endforeach
  </div>

</body>
@endsection