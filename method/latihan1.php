<?php
$mahasiswa = 
[
    [
    "nama" => "Sandhika Galih", 
    "npm" => "7138378237",
    "email" => "sandhika@unpas.ac.id",
    "jurusan" => "Informatika",
    "gambar" => "sandhika.png"
    ],  
    [
    "nama" => "Doddy Ferdiansyah", 
    "npm" => "7138378237",
    "email" => "doddy@unpas.ac.id",
    "jurusan" => "Informatika",
    "gambar" => "doddy.png"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach( $mahasiswa as $mhs) : ?>
            <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>"><?= $mhs['nama']?></a>     
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>