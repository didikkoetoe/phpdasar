<?php
session_start();
require "functions.php";
// Cek apakah masih ada cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id=$id");
    $username = mysqli_fetch_assoc($result);
    // cek ke aslian cookie
    if ($key === hash('sha256', $username["username"])) {
        // Set session menjadi true
        $_SESSION["login"] = $username["username"];
    }
}

// jika masih ada sesion, dilarang kembali ke halaman login
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    // Cek apakah username sama
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) > 0) {
        // cek password
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {
            // set session
            $_SESSION["login"] = $username;

            // Cek apakah tombol remember me di tekan
            if (isset($_POST["remember"])) {
                setcookie('id', $user["id"], time() + 60 * 2);
                setcookie('key', hash('sha256', $user['username']), time() + 60 * 2);
            }
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
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
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-center" role="alert">
                Username / Password Salah !
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="form">
            <div class="mb-3">
                <label for="username" class="form-label">Username : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Ingat Saya
                    </label>
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary px-5 float-start">Login</button>
            <a href="signup.php" class="btn btn-success px-5 float-end">Sign Up</a>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>