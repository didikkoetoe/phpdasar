<?php

$familys = [["Guntoro", "Bapak", "53"], ["Gimah", "Ibu", "52"], ["Yosafat Rudi", "Kakak pertama", "31"]];



$familys[] = ["Novi Elisabet", "Kakak Kedua", "29"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Keluarga</title>
</head>

<body>


    <h1>Anggota Keluarga</h1>

    <table border="1" cellspacing="0" cellpadding="10">
        <?php foreach ($familys as $family) : ?>
            <tr>
                <td>Nama</td>
                <td><?= $family[0]; ?></td>
                <td>Posisi</td>
                <td><?= $family[1]; ?></td>
                <td><?= $family[2]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>