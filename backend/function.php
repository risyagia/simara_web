<?php
session_start();

// membuat koneksi ke table
$host = "localhost";
$username = "root";
$password = "";
$db = "projek_kua";

$koneksi = mysqli_connect("localhost", "root", "", "projek_kua");

if(mysqli_connect_error()) {
    die("Koenksi Gatot :". mysqli_connect_error());
}else {
    echo " koneksi berhasil";
}

?>