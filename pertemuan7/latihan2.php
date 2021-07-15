<?php
// cek apakah tidak ada data di $_GET
if (!isset($_GET["judul"]) || !isset($_GET["pengarang"]) || !isset($_GET["tahun"]) || !isset($_GET["tahun"]) || !isset($_GET["penerbit"])) {
    // redirect
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
</head>

<body>


    <h1>Detail Buku</h1>
    <ul>
        <li>Judul Buku : <?= $_GET["judul"]; ?></li>
        <li>Pengarang : <?= $_GET["pengarang"]; ?></li>
        <li>Tahun Terbit : <?= $_GET["tahun"]; ?></li>
        <li>Penerbit : <?= $_GET["penerbit"]; ?></li>
        <li> Sampul : <img src="../image/<?= $_GET["sampul"]; ?>" alt=""></li>
    </ul>

    <a href="index.php">Kembali ke index</a>

</body>

</html>