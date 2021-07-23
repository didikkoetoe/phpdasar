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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/jquery.js"></script>
</head>

<body>
    <div class="container">
        <!-- header -->
        <h2 class="text-center">Sign Up</h2>
        <hr>
        <!-- akhir header -->

        <!-- form -->
        <form action="" class="form" id="form" method="POST">
            <div class="mb-2">
                <label for="username" class="form-label">username :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user-check"></i></div>
                    <input type="text" name="username" id="username" autocomplete="off" class="form-control" placeholder="Masukan username">
                </div>
                <small id="small">Tidak Boleh Kosong</small>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email :</label>
                <div class="input-group">
                    <div class="input-group-text"><i>@</i></div>
                    <input type="email" name="email" id="email" autocomplete="off" class="form-control" placeholder="Masukan email">
                </div>
                <small id="small">Tidak Boleh Kosong</small>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock-open"></i></div>
                    <input type="password" name="password" id="password" autocomplete="off" class="form-control" placeholder="Masukan password">
                </div>
                <small id="small">Tidak Boleh Kosong</small>
            </div>
            <div class="mb-0">
                <label for="password2" class="form-label">Konfirmasi Password :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    <input type="password" name="password2" id="password2" autocomplete="off" class="form-control" placeholder="Masukan password anda kembali">
                </div>
                <small id="small">Tidak Boleh Kosong</small>
            </div>

            <!-- syarat dan ketentuan -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="syarat" id="syarat">
                <label class="form-check-label" for="flexCheckChecked">Setuju Dengan Syarat dan Ketentuan</label>
            </div>
            <!-- akhir syarat dan ketentuan -->

            <!-- footer -->
            <button type="submit" name="register" id="register" class="btn btn-primary float-end">Register</button>
            <button type="reset" id="reset" class="btn btn-secondary float-end mx-3">Reset</button>
            <a href="login.php" class="btn btn-danger float-start">Kembali</a>
            <!-- akhir footer -->
        </form>
        <!-- akhir form -->
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>