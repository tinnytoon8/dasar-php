<?php
    $mahasiswa = [
        ["Sandhika Galih", "721737192", "Informatika", "sandhikagalih@unpas.ac.id"],
        ["Jordan", "721737192", "Industri", "jordan@unpas.ac.id"],
        ["Vinanda", "17378213729", "Manajemen", "vinanda@unpas.ac.id"]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
       <li>Nama : <?= $mhs[0]; ?></li>
       <li>NPM : <?= $mhs[1]; ?></li>
       <li>JUrusan : <?= $mhs[2]; ?></li>
       <li>Email : <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>