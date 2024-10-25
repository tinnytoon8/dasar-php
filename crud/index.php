<?php

session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php'; // memanggil file functions

// $mahasiswa = query("SELECT * FROM mhs");

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mhs"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mhs LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari diklik
if(isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 25px;
            position: absolute;
            top: 140px;
            margin-left: 10px;
            z-index: -1;
            display: none;
        }

        @media print {

        }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="tambah">tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari Data</button>

        <img src="img/loader.gif" class="loader">
        <br><br>
    </form>
    <br>

   <!-- Navigasi -->
   <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i= 1; $i<=$jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight:bold; color:blue"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1?>">&raquo;</a>
    <?php endif; ?>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id']; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin?'); ">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>"></td>
                <td><?= $row['npm']?></td>
                <td><?= $row['nama']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['jurusan']?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script1.js"></script>
</body>
</html>