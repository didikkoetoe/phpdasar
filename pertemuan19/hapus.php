<?php
session_start();
if (!$_SESSION["key"]) {
    header("Location: login.php");
    exit;
}

require "functions.php";
// Tangkap id yang dikirimkan
$id = $_GET["id"];

if (delete($id) > 0) {
    echo "<script>
    alert('Data berhasil di hapus');
    document.location.href='index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal di hapus');
    document.location.href='index.php';
    </script>";
}
