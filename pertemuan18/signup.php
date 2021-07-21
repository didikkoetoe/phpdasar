<?php
session_start();
require "functions.php";
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil di tambahkan');
        document.location.href='login.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di tambahkan');
        document.location.href='index.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <form action="" class="form" id="form" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">username :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user-check"></i></div>
                    <input type="text" name="username" id="username" autocomplete="off" required class="form-control" placeholder="Masukan username">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-inbox"></i></div>
                    <input type="email" name="email" id="email" autocomplete="off" required class="form-control" placeholder="Masukan email">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock-open"></i></div>
                    <input type="password" name="password" id="password" autocomplete="off" required class="form-control" placeholder="Masukan password">
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary float-end">Register</button>
            <button type="reset" class="btn btn-secondary float-end mx-3">Reset</button>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>