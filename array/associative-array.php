<?php
    // Array Associative
    // Definisinya sama dengan array numerik, kecuali
    // Key-nya adalah string yang kita buat sendiri
    $mahasiswa = [[
                "nama" => "Sandhika Galih", 
                "NPM" => "7138378237",
                "email" => "sandhika@unpas.ac.id",
                "jurusan" => "Informatika",
                "gambar" => "sandhika.png"
                ],  
                [
                "nama" => "Doddy Ferdiansyah", 
                "NPM" => "7138378237",
                "email" => "doddy@unpas.ac.id",
                "jurusan" => "Informatika",
                "gambar" => "doddy.png"
                ]
                ];
    
    // echo $mahasiswa[1][][1];
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
    <?php foreach ( $mahasiswa as $mhs ) : ?>
    <ul>
        <img src="img/<?php echo $mhs["gambar"]; ?>">
        <li><?php echo $mhs["nama"]; ?></li>
        <li><?php echo $mhs["NPM"]; ?></li>
        <li><?php echo $mhs["email"]; ?></li>
        <li><?php echo $mhs["jurusan"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>