<?php

require "function.php";

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "<script>
        alert('Data berhasil di hapus');
        document.location.href = 'admin.php';
        </script>";
} else {
    echo "<script>
        alert('Data gagal di hapus');
        document.location.href = 'admin.php';
        </script>";
}
