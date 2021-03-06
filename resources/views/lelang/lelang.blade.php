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
    @if (session('alert'))
    <div class="alert alert-warning">
      {{ session('alert') }}
    </div>
    @endif
    <h2>Event Lelang</h2><br>
    <div class="row">
      <div class="col-md-3">
        <a href="tambahlelang" class="btn btn-primary">Tambah Event Lelang</a>
      </div>
    </div><br>
    @foreach($view as $data)
    <div class="col-xs-6 col-md-3">
      <a href="" class="thumbnail">
        <img src="{{url('/eventlelang/'.$data->foto_event)}}" alt="barang" style="width:150px;height:150px">
      </a>
      <h4>Nama Event :{{$data->nama_lelang}}</h4>
      {{$data->deskripsi}}<br>
      <form method="post" action="{{url('admin/lelang/tutup/'.$data->id_lelang)}}">
        <button type="submit" class="btn btn-danger">Tutup Event Lelang</button>{{csrf_field()}}
      </td>
    </form>
  </div>
  @endforeach
</div>

</body>
@endsection