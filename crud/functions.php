<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajar-php");

// ambil data (fetch) mahasiswa dari objek result
// mysqli_fetch_row() -> mengembalikan array numerik
// mysqli_fetch_assoc() -> mengembalikan array associative
// mysqli_fetch_array() -> mengembalikan numerik dan associative
// mysqli_fetch_object() -> 

function query($query) {
    global $conn;  // Memanggil variabel global $conn
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;  // Menggunakan $rows[] untuk menambahkan data ke array
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    // upload gambar dulu
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO mhs (npm, nama, email, jurusan, gambar) VALUES ('$npm', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script>
        alert('Pilih gambarnya terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // explode -> fungsi untuk memecah sebuah string menjadi array menggunakan delimiter
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukuran gambarnya terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran Gambarnya terlalu besar!');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru.= '.';
    $namaFileBaru.= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM mhs WHERE id = $id");

    return mysqli_affected_rows($conn);

    // global $conn;
    // $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM siswa WHERE id='$id'"));
    // unlink('img/' . $id["gambar"]);
    // $query = "DELETE FROM siswa WHERE id='$id'";
    // mysqli_query($conn, $query);
    // return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data['id'];
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah user memilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    


    // query update data
    $query = "UPDATE mhs SET npm = '$npm', nama= '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mhs WHERE nama LIKE '%$keyword%' OR npm LIKE '$keyword' OR email LIKE '$keyword' OR jurusan LIKE '$keyword'";

    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";

        return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        </script>";

        return false;
    }

    // enkripsi dulu passwordnya
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);
}

