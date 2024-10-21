<?php
    // Date
    // Untuk menampilkan tanggal dengan format tertentu
    // echo date("l, d-M-Y");

    // Time
    // UNIX Timestamp / EPOCH time
    // detik yang sudah berlalu sejak 1 Januari 1970
    // echo time();
    // echo date("d M Y", time()-60*60*24*100);

    // mktime
    // Membuat sendiri detik
    // mktime(0, 0, 0, 0, 0, 0)
    // jam, menit, detik, bulan, tanggal, tahun
    // echo date ("l", mktime(0, 0, 0, 6, 10, 2001));

    // strtotime
    // echo date("l", strtotime("25 aug 1985"));

    function salam($waktu, $nama){
        return "Selamat $waktu, $nama!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?php echo salam("Pagi", "Sandhika"); ?></h1>
</body>
</html>