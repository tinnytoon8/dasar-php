<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php'; // memanggil file functions

$mahasiswa = query("SELECT * FROM mhs");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>';

        $i = 1;
        foreach($mahasiswa as $row) {
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td><img src="img/'. $row["gambar"] .'"></td>
                <td>'. $row["npm"] .'</td>
                <td>'. $row["nama"] .'</td>
                <td>'. $row["email"] .'</td>
                <td>'. $row["jurusan"] .'</td>
            </tr>';
        }
            
$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);