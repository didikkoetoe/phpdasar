<?php

require "function.php";

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil di tambahkan');
        </script>";

        header("Location: login.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>

    <h1>Registrasi Data Diri</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <br>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <li>
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2">
            </li>
            <br>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>

</body>

</html>