<?php
// Koneksi ke database
$db = mysqli_connect("localhost", "root","","buku");

// ambil data dari buku / query data buku
$result = mysqli_query($db, "SELECT * FROM buku");
if (!$result) {
    echo mysqli_error($db);
}

// ambil data ( fetch )buku dari object result
// mysqli_fetch_row()       / mengembalikan array numeric 
// mysqli_fetch_assoc()     / mengembalikan array associative
// mysqli_fetch_array()     / mengembalikan dua tipe array, sehingga data yang di tampilkan double
// mysqli_fetch_object()

// while ($bk = mysqli_fetch_assoc($result)){
// var_dump($bk)
// ;};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
</head>

<body>
    <h1>Daftar Buku</h1>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Penerbit</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><a href="">Ubah</a> |
                <a href="">Hapus</a>
            </td>
            <td><img src="../image/<?= $row["gambar"]; ?>" alt="" width="100"></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["pengarang"]; ?></td>
            <td><?= $row["tahun"]; ?></td>
            <td><?= $row["penerbit"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endwhile; ?>
    </table>


</body>

</html>