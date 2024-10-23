<?php

session_start();

if(!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET['id'];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mhs WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST['submit'])) {
    
    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "Data Gagal Diubah!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm" value="<?= $mhs['npm']; ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs['nama']; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" value="<?= $mhs['email']; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs['jurusan']; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <img src="img/<?= $mhs['gambar']?>" alt="" width="60"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br><br>
            <li>
                <button type="submit" name="submit">Simpan Data</button>
            </li>
        </ul>
    </form>
    <br><br>
    <a href="index.php">Kembali</a>
</body>
</html>

