<!DOCTYPE html>
<html>
<head>
  <title>List User</title>
  <link rel="shortcut icon"  href="img/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  *{
      font-family: 'Montserrat', sans-serif;
    }
    h2 {
      margin-top: 150px;
      text-align: center;
      color: whitesmoke;

    }
    .container {
      margin-top: 0px;
      padding: 50px;
      width: 60%;
      background-color: ;
      border-radius: 10px;
    }
    body{
      background:linear-gradient(#FDB674,whitesmoke); 
      font-weight: bold;   
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

  <nav class="navbar navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="img/icon.png" style="width: 100px; height: 30px;"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="#">Kuliner</a></li>
          <li><a href="#">Koleksi</a></li>
        </ul>
      </li>
      <li><a href="#"><li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li></a></li>
    </ul>

    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cari Disini" name="search">
      </div>
      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<h2>Persyaratan mengikuti lelang</h2><br>

  <div class="container">
        <p>Lelang adalah proses membeli dan menjual barang atau jasa dengan cara menawarkan kepada penawar, menawarkan tawaran harga lebih tinggi, dan kemudian menjual barang kepada penawar harga tertinggi. Dalam teori ekonomi, lelang mengacu pada beberapa mekanisme atau peraturan perdagangan dari pasar modal.</p>
    <p>Lelang dalam kerajinan.id memiliki persyaratan sebagai berikut :</p>
    <ul>
      <li>1. Pelelang harus mengisi Saldo terlebih dahulu untuk mengikuti proses Lelang di kerajinan.id</li>
    <li>2. Pelelang hanya boleh mengikuti pelelangan pada satu event lelang</li>
    <li>3. Pelelang tidak boleh menambah harga jika harga tersebut masih tertinggi</li>
    <li>4. Pelelang Tidak dapat memasukkan harga dibawah harga awal yang dimasukkan</li>
    <li>5. Proses Pelelangan hanya berlangsung selama batas waktu yang ditentukan</li>
    <li>6. Pelelang melakukan pembayaran setelah batas waktu lelang yang ditentukan telah berakhir</li>
    <li>7. Batas waktu pembayaran Pelelang hanya berlangsung selama 2 jam,jika barang tidak dibayar maka akan dikenakan sanksi,dan lelang akan diberikan kepada harga tertinggi kedua.</li>
</ul>

  <form>
    <input type="checkbox" name="checkbox"> Saya Menyetujui Persyaratan diatas
  </form><br>
  <button type="button" class="btn btn-success">Kirim</button>

</div>

</body>
</html>