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
                    <div class="input-group-text"><i class="fas fa-inbox"></i></div>
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
            <div class="mb-4">
                <label for="password2" class="form-label">Konfirmasi Password :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock-open"></i></div>
                    <input type="password" name="password2" id="password2" autocomplete="off" class="form-control" placeholder="Masukan password anda kembali">
                </div>
                <small id="small">Tidak Boleh Kosong</small>
            </div>
            <button type="submit" name="register" name="register" class="btn btn-primary float-end">Register</button>
            <button type="reset" class="btn btn-secondary float-end mx-3">Reset</button>
            <a href="login.php" class="btn btn-danger float-start">Kembali</a>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script>
        let login = $(document).ready(function() {
            $("#form").submit(function(e) {
                // e.preventDefault();

                let username = $("#username").val();
                let jmlUsername = username.length
                if (jmlUsername == 0) {
                    $("small:first").addClass("pesan");
                    $("#username").addClass("error");
                } else if (jmlUsername < 4) {
                    $("small:first").text("Minimal 4 karakter !");
                    // return false;
                } else {
                    $("#username").addClass("success");
                    $("small:first").addClass("pSuccess");
                }

                let email = $("#email").val();
                let jmlEmail = email.length;
                if (jmlEmail === 0) {
                    $("#email").addClass("error");
                    $("small:eq(1)").addClass("pesan");
                } else {
                    $("#email").addClass("success");
                    $("small:eq(1)").addClass("pSuccess");
                }

                let password = $("#password").val();
                let password2 = $("#password2").val();
                if (password == '' || password2 == '') {
                    $("#password , #password2").addClass("error");
                    $("small:eq(2)").addClass("pesan");
                    $("small:eq(3)").addClass("pesan");
                    return false;
                } else if (password != password2) {
                    $("#password , #password2").addClass("error");
                    $("small:eq(2)").addClass("pesan");
                    $("small:last").text("Password tidak sama");
                    $("small:eq(2)").addClass("pSuccess");
                    return false;
                } else {
                    $("#password , #password2").addClass("success");
                    $("small:eq(2)").addClass("pSuccess");
                }
            });

        });
    </script>
</body>

</html>