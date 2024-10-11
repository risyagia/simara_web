<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "projek_kua";

$mysqli = new mysqli($localhost, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    echo "File berhasil diupload.";
} else {
    echo "Error saat mengupload file.";
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis = $_POST['jenis'];
$foto = $target_file;

$sql = "INSERT INTO tempat_ibadah (nama, alamat, jenis, foto) VALUES ('$nama', '$alamat', '$jenis', '$foto')";

if ($mysqli->query($sql) === TRUE) {
    echo "Tempat ibadah berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
