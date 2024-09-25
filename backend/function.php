<?php
// Memeriksa apakah session sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Membuat koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$db = "projek_kua";

$koneksi = mysqli_connect($host, $username, $password, $db);

// Mengecek koneksi, apakah gagal
if(!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
