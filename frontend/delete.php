<?php 
include_once '../backend/function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryDelete = "DELETE FROM pernikahan WHERE id = '$id'";
    $hapus = mysqli_query($koneksi, $queryDelete);

    if ($hapus) {
        header('Location: pernikahan_dashboard.php');
        exit();
    } else {
        echo 'Hapus Error: ' . mysqli_error($koneksi);
    }
} else {
    echo 'ID Tidak Ditemukan';
}
?>

