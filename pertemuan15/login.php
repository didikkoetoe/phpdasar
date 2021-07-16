<?php

require "function.php";

if (isset($_POST["submit"])) {
    // Tangkap data
    $username = strtolower(htmlspecialchars($_POST["username"]));
    $password = $_POST["password"];

    // Cek apakah username benar
    if ($cek = read("SELECT * FROM users WHERE username = '$username'")) {
        // cek password
        if (password_verify($password, $cek[0]["password"])) {
            // Jika benar arahkan ke halaman admin
            header("Location: admin.php");
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
                <button type="submit" name="submit">Login</button>
            </li>
        </ul>
    </form>

</body>

</html>