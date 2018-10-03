<?php 
    session_start();
    require 'function.php';

    if(isset($_POST["login"])){
        $email      = $_POST["email"];
        $password = $_POST["password"];
       

//         $email = stripslashes($email);
// $password = stripslashes($password);
 
        $result =mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");


        //cek nik
        if(mysqli_num_rows($result) === 1){

            //cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row["password"]) ){

                $_SESSION["login"] = true;

                header("Location:index.php");
                exit;
            }
        }

        $error = true;
    }
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="background-image:url(businessman.png);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>