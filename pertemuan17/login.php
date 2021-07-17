<?php

session_start();
require "function.php";

// Cek apakah cookie masih ada
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    // * Tampung nilai id dan key ke dalam variable
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // * hubungkan dengan database untuk mengecek ke aslian key
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    // * Setelah itu cek apakah key sama dengan username yang ada di database;
    $row = mysqli_fetch_assoc($result);
    if ($key === hash('sha256', $row["username"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["submit"])) {
    // Tangkap data
    $username = strtolower(htmlspecialchars($_POST["username"]));
    $password = $_POST["password"];

    // Cek apakah username benar
    if ($cek = read("SELECT * FROM users WHERE username = '$username'")) {
        // cek password
        if (password_verify($password, $cek[0]["password"])) {
            // ! Set $_SESSION
            $_SESSION["login"] = true;

            // Cek apakah tombol remember me telah di tekan
            if (isset($_POST["remember"])) {
                // * cookie id untuk menghubungkan dengan database
                setcookie('id', $cek[0]["id"], time() + 60 * 2);
                // * cookie key untuk mengecek keaslian cookie
                setcookie('key', hash('sha256', $cek[0]["username"]), time() + 60 * 2);
            }
            // Jika benar arahkan ke halaman index
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
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">Username / Password salah</p>
    <?php endif; ?>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Usernmae : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </ul>
    </form>

</body>

</html>