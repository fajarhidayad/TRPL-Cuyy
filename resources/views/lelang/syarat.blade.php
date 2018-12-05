@extends('layouts.atas')

@section('content')

<div class="container">
  <div class="row" style="margin: auto; width: 100px;">
    <h2 align="center">{{ $lelang->nama_lelang }}</h2>
    <div>
      <img src="{{url('/eventlelang/'.$lelang->foto_event)}}"  alt="barang" style="width:150px;height:150px">
    </div>
    <p align="center">{{ $lelang->deskripsi }}</p>
  </div>

  <div class="row">
    <h2>Persyaratan mengikuti lelang</h2><br>


    <p>Lelang adalah proses membeli dan menjual barang atau jasa dengan cara menawarkan kepada penawar, menawarkan tawaran harga lebih tinggi, dan kemudian menjual barang kepada penawar harga tertinggi. Dalam teori ekonomi, lelang mengacu pada beberapa mekanisme atau peraturan perdagangan dari pasar modal.</p>
    <p>Lelang dalam kerajinan.id memiliki persyaratan sebagai berikut :</p>
    <ul>
      <li>1. Pelelang harus mengisi Saldo terlebih dahulu untuk mengikuti proses Lelang di kerajinan.id</li>
      <li>2. Pelelang hanya boleh mengikuti pelelangan pada satu event lelang</li>
      <li>3. Pelelang tidak boleh menambah harga jika harga tersebut masih tertinggi</li>
      <li>4. Pelelang Tidak dapat memasukkan harga dibawah harga awal yang dimasukkan</li>
      <li>5. Proses Pelelangan hanya berlangsung selama batas waktu yang ditentukan</li>
      <li>6. Pelelang melakukan pembayaran setelah batas waktu lelang yang ditentukan telah berakhir</li>
      <li>7. Batas waktu pembayaran Pelelang hanya berlangsung selama 2 jam,jika barang tidak dibayar maka akan dikenakan sanksi,dan lelang akan diberikan kepada harga tertinggi kedua.
      </li>
    </ul>

    <form>
      <input type="checkbox" name="checkbox" required> Saya Menyetujui Persyaratan Diatas <br><br>
      <button type="button" class="btn btn-success" onclick="if(!this.form.checkbox.checked){alert('Anda Harus Menyetujui Persyaratan.');return false}else{window.location='{{ url('event/lelang/masuk') }}'}">Kirim</button>
    </form><br>

  </div>
</div>
@endsection