<?php 

//  Ini adalah komentar satu baris
/* Ini adalah komentar dua baris
contoh nya  adalah ini, ganti baris dari 4 ke bisa bisa */

// Standart output
// echo, print
// print_r / Untuk array
// var_dump() / Ini untuk mengecek debugging atau kesalahan suatu program

// var_dump("Didik Prabowo"); //Var dump untuk mengecek tipe datanya apa dan ukurannya berapa

// Penulisan sintaks PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variable dan Tipe Data
// Variable
// aturan membuat variable, tidak boleh di awali dengan angka, tapi boleh mengandung angka
// Kutip dua "" di PHP lebih sakti, karena memiliki fitur interpolasi
// $nama = "Didik";

// Operator
// Aritmatika
// + - * / %
// $x = 10;
// $y = 20;
// echo $x * $y;

// Operator penggabung string / concatenation
// .
// $nama_depan = "didik";
// $nama_belakang = "Prabowo";
// echo $nama_depan." ".$nama_belakang;

// Operator Assignment
// = , += , -= , *= , /= 
// $x = 1;
// $x -= 5;
// echo $x;
// $nama = "Didik";
// $nama .= " ";
// $nama .= "Prabowo";
// echo $nama;

// Perbandingan
// < , > , <= , >= , == , !=
// var_dump(1 === "1");

// Identitas
// === , !==
// Logika
// && , || , !
$x = 10;
var_dump($x < 20 && $x % 2 == 0);






?>