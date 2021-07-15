<?php 
// Date
// Untuk menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// Detik yang sudah berlalu sejak 1 Januari 1970
// echo time()
// time() adalah waktu saat ini
// echo date("d M Y", time()-60*60*24*100);

// mktime
// Membuat sendiri detik
// mktime(0,0,0,0,0,0)
// formatnya = jam, menit, detik, bulan, tanggal, tahun
// echo date("l, m - d - Y",mktime(6,0,0,11,4,2001));

// strtotime()
echo date("l", strtotime("04 Nov 2001") );





 ?>