<?php
require "functions.php";

if (isset($_POST["tambah"])) {
    // Kirim data
    if (insert($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil di tambahkan');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di tambahkan');
        document.location.href='tamabah.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Teman</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="css/tambah.css">
    <script src="js/jquery.js"></script>
</head>

<body>
    <!-- Form Tambah -->
    <div class="container border rounded">
        <h2 class="text-center mt-3 mb-3">Tambah Teman</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="form" id="form">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Teman Anda" required autocomplete="off">
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-search-location"></i></div>
                    <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" placeholder="Masukan Alamat" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-school"></i></div>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" autocomplete="off" placeholder="Masukan Jurusan" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Ulang Tahun : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-image"></i></div>
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-3 float-end" name="tambah" id="tambah">Tambah</button>
            <button type="reset" class="btn float-end btn-secondary me-3">Reset</button>
        </form>
    </div>
    <!-- Ahkir Form Tambah -->

    <script src="js/bootstrap.min.js"></script>
</body>

</html>