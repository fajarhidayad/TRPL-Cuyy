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
    
    .container {
      margin-top: 200px;
    }
    body{
      background-color:#eaeaea;
    }
    .header{
      height: 500px;
      background:linear-gradient(#FDB674,#fcbd83,whitesmoke);
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

  <div class="container">
  <h1>Daftar User</h1>
          
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>E-mail</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>No Hp</th>
        <th>Foto KTP</th>
        <th>Action</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>agda</td>
        <td>dgdga<td>
        <td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>