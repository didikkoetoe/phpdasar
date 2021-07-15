<?php 

require "function.php";

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

        <?php $i=0; ?>

    </table>

</body>

</html>