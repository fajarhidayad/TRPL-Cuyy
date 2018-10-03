
<?php 
    
    require 'function.php';

    if (isset($_POST["daftar"])) {
        # code...
        if (pendaftaran($_POST)>0) {
            # code...
            echo "<script>
            alert('Berhasil Daftar!')
            </script>

            ";
            header("Location:index.php");
        }else{
            echo mysqli_error($conn);
        }

    }

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="register-photo" style="height:772px;" style="width: 500px;">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/bambu.jpg&quot;);"></div>
            <form method="post">
                <h2 class="text-center">Daftar</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" id="email"></div>
                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" id="username"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" id="password"></div>
                <div class="form-group"><input class="form-control" type="text" name="alamat" placeholder="Alamat" id="alamat"></div>
                <label>Jenis Kelamin</label>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2">
                    <label class="form-check-label" for="formCheck-2">Laki-Laki</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1">
                    <label class="form-check-label" for="formCheck-1">Perempuan</label></div>
                <label>Tanggal Lahir</label>
                <input class="form-control" type="date" data-date-format="YYYY-MM-DD" name="tanggal_lahir"><br>
                <div class="form-group"><input class="form-control" type="text" name="kartu_kredit" placeholder="Kartu Kredit" id="kartuKredit"></div>
                <div class="form-group"><input class="form-control" type="text" name="sosmed" placeholder="Sosial Media" id="SosialMedia"></div>
                <div class="form-group"><input class="form-control" type="number" name="telepon" placeholder="Nomer Telepon" id="telpon"></div>
                <input type="file" name="foto">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="daftar">Daftar</button>
                    </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function masuk(){
            var email = document.getElementById("email").value;
            var username = document.getElementById("username").value;
            var username = document.getElementById("password").value;
        }
    </script>
</body>

</html>