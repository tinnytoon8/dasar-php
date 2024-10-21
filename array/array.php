<?php
    // array
    // Variabel yang dapat memiliki banyak nilai
    // Elemen pada array boleh memiliki tipe data yang berbeda
    // Pasangang antara key dan value
    // key-nya adalah index, yang dimulai dari 0

    // Membuat array
    // Cara lama
    $hari = array("Senin", "Selasa", "Rabu");
    // Cara baru
    $bulan = ["Januari", "Februari", "Maret"];
    $arr1 = [123, "tulisan", false];

    // Menampilkan array
    // var_dump() / print_r()
    // var_dump($hari);
    // echo "<br>";
    // print_r($bulan);
    // echo "<br>";

    // Menampilkan 1 elemen pada array
    // echo $arr1[1];
    // echo "<br>";
    // echo $bulan[1];
    
    // Menambahkan elemen baru pada array
    // $hari[] = "Kamis";
    // $hari[] = "Jumat";
    // echo "<br>";
    // var_dump($hari);

    // Pengulangan pada array
    // for / foreach
    $angka = [1, 3, 4, 6, 12, 18, 1, 2, 3, 4, 5];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>
<title>Latihan</title>
<style>
    .kotak {
        width: 50px;
        height: 50px;
        background-color: salmon;
        text-align: center;
        line-height: 50px;
        margin: 3px;
        float: left;
    }
    .clear { clear : both; }
</style>
<body>
    <?php for ($i=0; $i<count($angka); $i++) { ?>
        <div class="kotak"><?php echo $angka[$i]; ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $a ) { ?>
        <div class="kotak"><?php echo $a ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $a) : ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>
</body>
</html>