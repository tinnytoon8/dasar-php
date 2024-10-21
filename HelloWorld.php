<?php
    // $nama = "Robin Herduino";
    
    // echo "Haloo, Nama saya ". $nama;

    // $angka1 = 50;
    // $angka2 = 5;

    // // Proses Operator
    // $penjumlahan = $angka1 + $angka2;
    // $pengurangan = $angka1 - $angka2;
    // $perkalian = $angka1 * $angka2;
    // $pembagian = $angka1 / $angka2;
    // $mod = $angka1 % $angka2;
    
    // // Hasil Operator
    // echo "Hasil dari penjumlahan angka 1 dan angka 2 yaitu " . $penjumlahan . '<br>';
    // echo "Hasil dari pengurangan angka 1 dan angka 2 yaitu " . $pengurangan . '<br>';
    // echo "Hasil dari perkalian angka 1 dan angka 2 yaitu " . $perkalian . '<br>';
    // echo "Hasil dari pembagian angka 1 dan angka 2 yaitu " . $pembagian . '<br>';
    // echo "Hasil dari sisa bagi angka 1 dan angka 2 yaitu " . $mod . '<br>';

    // Diketahui nilai siswa
    $nilaiUTS = 90;
    $nilaiUAS = 10;

    // Menghitung total nilai rata - rata siswa
    $totalNilai = ($nilaiUTS + $nilaiUAS)/2;

    // Kondisi Percabangan untuk penentuan Grade berdasarkan total nilai
    if($totalNilai > 100){
        echo "Maaf, nilai yang anda masukan tidak valid";
    }else if($totalNilai >=90){
        echo "Nilai anda " . $totalNilai . " dengan Grade A";
    }else if($totalNilai >=60){
        echo "Nilai anda " . $totalNilai . " dengan Grade B";
    }else if($totalNilai >=30){
        echo "Nilai anda " . $totalNilai . " dengan Grade C";
    }else if($totalNilai >=1){
        echo "Nilai anda " . $totalNilai . " dengan Grade D";
    }else if($totalNilai == 0){
        echo "Nilai anda " . $totalNilai . " dengan Grade E";
    }else{
        echo "Nilai anda " . $totalNilai . " Maaf, nilai yang anda masukan tidak valid";
    }

    // if($totalNilai > 100){
    //     echo "Maaf, nilai yang anda masukan tidak valid";
    // }
    // if($totalNilai >= 90){
    //     echo "Nilai anda " . $totalNilai . " dengan Grade A";
    // }
    // if($totalNilai >= 60){
    //     echo "Nilai anda " . $totalNilai . " dengan Grade B";
    // }
    // if($totalNilai >= 30){
    //     echo "Nilai anda " . $totalNilai . " dengan Grade C";
    // }
    // if($totalNilai >= 1){
    //     echo "Nilai anda " . $totalNilai . " dengan Grade D";
    // }
    // if($totalNilai == 0){
    //     echo "Nilai anda " . $totalNilai . " dengan Grade E";
    // }
    // if($totalNilai<0){
    //     echo $totalNilai . "Maaf, nilai yang anda masukan tidak valid";
    // }

?>