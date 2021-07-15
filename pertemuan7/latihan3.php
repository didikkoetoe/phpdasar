<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT</title>
</head>

<body>

    <?php if (isset($_POST["submit"])) : ?>
        <h1>selamat datang, <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>
    <form action="" method="post">
        <label for="nama">Masukan nama :</label>
        <input type="text" name="nama" id="nama">
        <br>
        <button type="submit" name="submit">Kirim data</button>
    </form>
</body>

</html>