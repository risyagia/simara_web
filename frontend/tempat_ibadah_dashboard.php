<?php 
include_once '../backend/function.php';
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $embed_map = mysqli_real_escape_string($koneksi, $_POST['embed_map']);
    $deskripsi_singkat = mysqli_real_escape_string($koneksi, $_POST['deskripsi_singkat']);
    $kegiatan_rutin = mysqli_real_escape_string($koneksi, $_POST['kegiatan_rutin']);

    // Insert query
    $query = "INSERT INTO tempat_ibadah_dash (nama, lokasi, embed_map, deskripsi_singkat, kegiatan_singkat)
              VALUES ('$nama', '$lokasi', '$embed_map', '$deskripsi_singkat', '$kegiatan_rutin')";
    
    // Execute query and check for success
    if (mysqli_query($koneksi, $query)) {
        // Redirect to the same page to prevent duplicate submissions on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }
}

// Select query to retrieve data for display
$query = "SELECT * FROM tempat_ibadah_dash";
$result = mysqli_query($koneksi, $query);



mysqli_close($koneksi);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Ibadah</title>
    <link rel="stylesheet" href="css/style_ibadah_dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span><img src="img/logo simara no title.png" width="35px" style="margin-top: 10px; margin-left: 15px;"></span>
                        <h1 class="header">SiMaRa</h1>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pernikahan_dashboard.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Pernikahan</span>
                    </a>
                </li>
                <li>
                    <a href="tempat_ibadah_dashboard.php">
                        <span class="icon"><ion-icon name="moon-outline"></ion-icon></span>
                        <span class="title">Tempat Ibadah</span>
                    </a>
                </li>
                <li>
                    <a href="madrasah_dashboard.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">Madrasah</span>
                    </a>
                </li>
                <li>
                    <a href="program|_dashboard.php">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Program</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="judul">
                    <img src="img/logo kua.svg">
                    <h1>Kantor Urusan Agama PUSAKA Kecamatan Karawang Barat</h1>
                </div>
            </div>
            <div class="cardBox">
                <h1>Pendataan Masjid di kecamatan karawang barat</h1>
            </div>
            <input type="search" placeholder="Cari nama atau lokasi " class="search-input "><img src="img/search.png" style="position: absolute; width: 20px; margin-top: 3rem; left: 4.5%;">
            <div class="table">
                <div class="header-tabel">
                    <h1 style="font-size: 20PX; margin-top: 10px; color: #3B3E51; opacity: 60%; font-family: 'poppins', sans-serif; ">Menampilkan Data Semua Masjid</h1>
                    <button id="btn-tambah"><ion-icon name="add-circle-outline" style="cursor: pointer;"></ion-icon>Tambah</button>
                </div>
               <!-- Modal Structure -->
                <div id="modal-popup" class="modal">
                    <div class="modal-content">
                        <div class="header-modal">
                            <span class="close-modal">&times;</span>
                            <h2 style="color: #3B3E51; font-family: 'poppins',sans-serif;">Tambah Data Masjid</h2>
                        </div>
    <form action="proses_form.php" method="POST" enctype="multipart/form-data">
    <br><br>
    <div class="modal-input">
        <div class="input1" id="input1">
            <span class="iconify" data-icon="solar:upload-linear" data-width="70" style="opacity: 50%; margin-top: -1rem; position: relative; margin-left: 40%;"></span><br>
            <span style="color: rgb(150, 150, 150);">Seret & Lepas file disini atau klik di bawah ini</span>
            <button type="button" id="button-foto">Pilih File</button>
            <input type="file" id="file-input" name="file_input" hidden accept="image/*" style="margin-top: 2rem;">
            <span style="color: red; font-size: smaller;">Maksimal Berukuran 1MB</span>
            <p id="drop-hint" style="display:none; color: gray; margin-top: 10px;">
                Jatuhkan Foto Disini
            </p>
            <img id="preview" src="#" alt="Preview" style="display:none; margin-top: -13rem; width: 100px; height: 100px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px; position: absolute; margin-left: 24.2rem;">
            <p id="file-name" style="display:none; margin-left: 24.2rem; position: absolute; margin-top: -4rem;"></p>
        </div>
        <div class="input2">
            <label for="nama-masjid">Nama Tempat Ibadah:</label>
            <input type="text" id="nama-masjid" name="nama_masjid" required>
            <label for="lokasi-masjid">Lokasi:</label>
            <input type="text" id="lokasi-masjid" name="lokasi_masjid" required>
        </div>
        <div class="input3">
            <label for="desk-masjid">Deskripsi:</label>
            <textarea id="desk-masjid" name="desk_masjid" style="height: 10rem; width: 47rem; border: 0.5px solid #8f8f96; border-radius: 13px; padding: 10px; box-sizing: border-box;" required></textarea>
        </div>
        <div class="input4">
            <label for="kegiatan-masjid">Kegiatan Rutin:</label>
            <textarea id="kegiatan-masjid" name="kegiatan_masjid" style="height: 10rem; width: 23rem; border: 0.5px solid #8f8f96; border-radius: 13px; padding: 10px; box-sizing: border-box;" required></textarea>
        </div>
        <div class="input5">
            <label for="map-masjid">Embed Map:</label>
            <textarea id="map-masjid" name="map_masjid" style="height: 10rem; width: 22rem; border: 0.5px solid #8f8f96; border-radius: 13px; padding: 10px; box-sizing:border-box;" required></textarea>
        </div>
    </div>
    <div class="modal-buttons">
        <button type="button" id="btn-batal">Batal</button>
        <button type="submit" id="btn-simpan" name="simpan">Simpan</button>
        </div>
</form>

                    </div>
                </div>
                <!-- Modal Konfirmasi Hapus -->
                <div id="modal-konfirmasi" class="modal-hapus">
                    <div class="modal-content-hapus">
                        <dotlottie-player src="https://lottie.host/bc8a120e-5ed4-4bca-a3c2-f257898c0810/sUEQGb5RuL.json" background="transparent" speed="1" style="width: 200px; height: 200px; margin-left: 6rem;" loop autoplay></dotlottie-player>
                        <h2>Yakin Hapus Data ?</h2>
                        <p>Pastikan Kembali Sebelum Hapus Data</p>
                        <div class="modal-buttons-hapus">
                            <button id="btn-hapus">Hapus</button>
                            <button id="btn-batal-hapus">Batal</button>
                        </div>
                    </div>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Embed Map</th>
                        <th>Deskripsi Singkat</th>
                        <th>Kegiatan Rutin</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                       <td><?php echo $row['nama'] ?></td>
                       <td><?php echo $row['lokasi'] ?></td>
                       <td><?php echo $row['embed_map'] ?></td>
                       <td><?php echo $row['deskripsi_singkat'] ?></td>
                       <td><?php echo $row['kegiatan_rutin'] ?></td>
                        <td>
                          <a href=""></a>  <ion-icon name="trash-outline" class="icon-delete" style="cursor: pointer; "></ion-icon>
                           <a href=""></a> <ion-icon name="create-outline" class="icon-edit"></ion-icon>
                        </td>
                    </tr>
                    <?php $no++; endwhile;?>
                    </tbody>
                   
                </table>
            </div>
        </div>
        <script src="js/js_ibadah.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</body>

</html>
