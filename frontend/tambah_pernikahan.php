<?php 

include_once '../backend/function.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $pernikahan = $_POST['pernikahan'];
    $isbat_nikah = $_POST['isbat_nikah'];

    $query = "INSERT INTO pernikahan ('bulan', 'tahu', 'pernikahan', 'isbat_nikah') VALUES ('$bulan', '$tahun', '$pernikahan', '$isbat_pernikahan')";
    $insert = mysqli_query($koneksi, $query);

    if($insert) {
        echo 'Anda Gagal Menambahkan Data:' . mysqli_error($koneksi);
    }
}

?>