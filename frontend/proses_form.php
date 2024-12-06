<?php 

include_once '../backend/function.php';
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama_masjid = $_POST['nama_masjid'];
    $lokasi_masjid = $_POST['lokasi_masjid'];
    $desk_masjid = $_POST['desk_masjid'];
    $kegiatan_masjid = $_POST['kegiatan_masjid'];
    $map_masjid = $_POST['map_masjid'];
    

    if(isset($_FILES['file_input']) && $_FILES['file_input']['error'] == 0){
        $file = $_FILES['file_input'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $max_size = 1 * 1024 * 1024; // 1MB

        if(in_array($file['type'], $allowed_types) && $file['size'] <= $max_size) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $file_name = time() . '_' . basename($file['name']);
            $target_file = $upload_dir . $file_name;

            if(move_uploaded_file($file['tmp_name'], $target_file)) {
                echo "File Berhasil Di unggah: " .$target_file ."<br>";
            } else {
                echo "Gagal mengunggah file.<br>";
            }
        } else {
            echo "File tidak sesuai dengan format yang diharapkan.<br>";
        }
    } else{
        echo "Tidak ada file yang di unggah.<br>";
    }
     // Tampilkan data lainnya
     echo "Nama Tempat Ibadah: $nama_masjid<br>";
     echo "Lokasi: $lokasi_masjid<br>";
     echo "Deskripsi: $desk_masjid<br>";
     echo "Kegiatan Rutin: $kegiatan_masjid<br>";
     echo "Embed Map: $map_masjid<br>";
 }


?>