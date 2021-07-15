<?php

// Hubungkan dengan halaman tempat menyimpan function
require "function.php";

$books = read("SELECT * FROM buku");
// Diatas sudah menghasilkan array numeric

// cek apakah tombol cek di pencet atau belum
if (isset($_POST["cari"])) {
    $books = search($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Selamat datang Admin</h1>

    <form action="" method="POST">
        <input type="text" name="keyword" size="40px" autocomplete="off" autofocus placeholder="Masukan keyword pencarian....">
        <button type="submit" name="cari">Cari</button>
    </form>

    <a href="tambah.php">Tambahkan Buku</a>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Penerbit</th>
            <th>Gambar</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="hapus.php?id=<?= $book["id"] ?>" onclick="return confirm('Apakah anda yakin untuk mengapus data ini ?');">Hapus</a> |
                    <a href="edit.php?id=<?= $book["id"] ?>">Edit</a>
                </td>
                <td><?= $book["judul"]; ?></td>
                <td><?= $book["pengarang"]; ?></td>
                <td><?= $book["tahun"]; ?></td>
                <td><?= $book["penerbit"]; ?></td>
                <td>
                    <img src="../image/<?= $book['gambar']; ?>" alt="">
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>