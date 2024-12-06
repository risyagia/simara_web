<?php
include_once '../backend/function.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])) {
    // Retrieve and sanitize input
    $nama_masjid = mysqli_real_escape_string($koneksi, $_POST['nama_masjid']);
    $lokasi_masjid = mysqli_real_escape_string($koneksi, $_POST['lokasi_masjid']);
    $desk_masjid = mysqli_real_escape_string($koneksi, $_POST['desk_masjid']);
    $kegiatan_masjid = mysqli_real_escape_string($koneksi, $_POST['kegiatan_masjid']);
    $map_masjid = mysqli_real_escape_string($koneksi, $_POST['map_masjid']);
    
    // Validate input fields
    if (empty($nama_masjid) || empty($lokasi_masjid) || empty($desk_masjid) || empty($kegiatan_masjid) || empty($map_masjid)) {
        echo "<script>alert('Semua field wajib diisi.');</script>";
        exit();
    }

    // File upload handling
    $file_path = '';
    if (isset($_FILES['file_input']) && $_FILES['file_input']['error'] == 0) {
        $file = $_FILES['file_input'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $max_size = 1 * 1024 * 1024; // 1MB
        $upload_dir = 'uploads/';

        if (!in_array($file['type'], $allowed_types)) {
            echo "<script>alert('Format file tidak valid. Hanya diperbolehkan JPEG, PNG, atau JPG.');</script>";
            exit();
        }

        if ($file['size'] > $max_size) {
            echo "<script>alert('Ukuran file terlalu besar. Maksimal 1MB.');</script>";
            exit();
        }

        if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true)) {
            die("Gagal membuat folder untuk menyimpan file.");
        }

        $file_name = time() . '_' . basename($file['name']);
        $file_path = $upload_dir . $file_name;

        if (!move_uploaded_file($file['tmp_name'], $file_path)) {
            echo "<script>alert('Gagal mengunggah file.');</script>";
            exit();
        }
    }

    // Insert data into database
    $query = "INSERT INTO tempat_ibadah_dashboard (nama_masjid, lokasi_masjid, desk_masjid, kegiatan_masjid, map_masjid, file_path) 
              VALUES ('$nama_masjid', '$lokasi_masjid', '$desk_masjid', '$kegiatan_masjid', '$map_masjid', '$file_path')";

    if (!mysqli_query($koneksi, $query)) {
        die("Error inserting data: " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil disimpan.');</script>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
