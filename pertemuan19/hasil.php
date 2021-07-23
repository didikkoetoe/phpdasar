<?php
require "functions.php";

$keyword = $_GET["keyword"];
$query = "SELECT * FROM teman WHERE
    nama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    birthday LIKE '%$keyword%'";

$friends = read($query);

?>
<!-- <div class="container border bg-light mt-4 rounded"> -->
<h2 class="text-center mt-3">Hasil Pencarian</h2>
<a href="tambah.php" class="btn btn-success">Tambah Teman</a>



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
<!-- </div> -->
<!-- Akhir Data -->