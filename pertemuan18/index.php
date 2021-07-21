<?php
session_start();
require "functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$friends = read("SELECT * FROM teman");

if (isset($_POST["cari"])) {
    $friends = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <script src="js/jquery.js"></script>
</head>

<body class="bg-secondary">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1"><?= $_SESSION["login"]; ?></span> <!-- Brand -->

            <form class="d-flex" method="POST">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="cari">cari</button>
            </form>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Data -->
    <div class="container border bg-light mt-4 rounded">
        <h2 class="text-center mt-3">Daftar Teman</h2>
        <a href="tambah.php" class="btn btn-success">Tambah Teman</a>
        <a href="logout.php" class="btn btn-warning float-end">Log Out</a>
        <hr>
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Ulang tahun</th>
                    <th scope="col">Foto</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1; ?>
                <?php foreach ($friends as $friend) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><a href="edit.php?id=<?= $friend["id"]; ?>" class="btn btn-success btn-sm">Edit</a> |
                            <a href="hapus.php?id=<?= $friend["id"]; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                        <td><?= $friend["nama"]; ?></td>
                        <td><?= $friend["alamat"]; ?></td>
                        <td><?= $friend['jurusan']; ?></td>
                        <td><?= $friend["birthday"]; ?></td>
                        <td><img class="img-thumbnail" style="width: 100px;height:100px;" src="img/<?= $friend["gambar"]; ?>" alt="Foto <?= $friend["nama"]; ?>"></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir Data -->

    <script src="js/bootstrap.min.js"></script>
</body>

</html>