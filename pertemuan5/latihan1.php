<?php
// Array
// variable yang mempunyai banyak nilai / variable yang lebih sakti
// element pada array boleh memiliki tipe data yang berbeda
// Pasangan antara key dan value
// key nya adalah index, yang di mulai dari 0

// Membuat array
// Cara lama
$hari = array("Senin", "Selasa", "Rabu");
// Cara baru
$bulan = ["Januari", "Februari", "Maret"];
$arr1 = [123, "string", false];

// Menampilkan array
// var_dump() / print_r()
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo ("<br>");

// Menampilkan 1 element pada array
// echo $arr1[0];
// echo ("<br>");
// echo $bulan[1];

// Menambahkan element baru pada array
var_dump($hari);
$hari[] = "Kamis";
echo ("<br>");
var_dump($hari);
