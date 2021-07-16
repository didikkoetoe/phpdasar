<?php

if (isset($_POST["submit"])) {
    // Cek apakah username dan password benar
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
        // Jika benar alihkan ke halaman admin.php
        header("Location: admin.php");
        exit;
    } else {
        // Jika salah set variable error
        $error = true;
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
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p>Username / Password salah !</p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br><br>
        <button type="submit" name="submit">Masuk</button>
    </form>

</body>

</html>