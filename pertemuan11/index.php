<?php 

require "function.php";

$books = read("SELECT * FROM buku");

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

    <h1>Selamat datang Didik</h1>

    <a href="create.php">Tambah Data</a>
    
    <table border="1" cellspacing="0" cellpadding="10">
        <th>No</th>
        <th>Aksi</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Penerbit</th>
        <th>Gambar</th>

        <?php $i=1; ?>
        <?php foreach ( $books as $book) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="edit.php?id=<?= $book["id"]; ?>">Edit</a> | 
                    <a href="delete.php?id=<?= $book["id"]; ?>">Hapus</a>
                </td>
                <td><?= $book["judul"]; ?></td>
                <td><?= $book["pengarang"]; ?></td>
                <td><?= $book["tahun"]; ?></td>
                <td><?= $book["penerbit"]; ?></td>
                <td><img src="../image/<?= $book["gambar"]; ?>" alt="" width="100"></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>