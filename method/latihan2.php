<?php
// cek apakah tidak ada data di $_GET
if(!isset($_GET['nama']) ||
    !isset($_GET['npm']) || 
    !isset($_GET['email']) ||
    !isset($_GET['jurusan'])) {
    // redirect
    header("Location: latihan1.php");
}

// GET -> metode pengiriman data melalui url dan data tersebut bisa diambil atau ditangkap oleh variabel superglobal variabel get  
// POST -> metode pengiriman data melalui form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Detail Mahasiswa</h1>
    <ul>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["npm"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
    </ul>

    <a href="latihan1.php">Kembali</a>
</body>
</html>