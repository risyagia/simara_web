<?php
$mysqli = new mysqli("localhost", "root", "", "projek_kua");

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$sql = "SELECT * FROM tempat_ibadah";
if ($filter) {
    $sql .= " WHERE jenis = '$filter'";
}

$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tempat Ibadah</title>
    <link rel="stylesheet" href="css/style_ibadah.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="img/simara.png" type="image/x-icon">

    <style>
   .tempat-ibadah-box {
    display: flex;
    flex-direction: column; /* Mengatur elemen di dalamnya agar vertikal */
    margin: 0 auto;
    align-items: center; /* Menjaga elemen tetap di tengah secara horizontal */
    text-align: center; 
    margin-bottom: 5px; 
    width: 20rem;
}

.tempat-ibadah-box img {
    display: block; 
    margin: 0 auto; 
}

.tempat-ibadah-box h3, .tempat-ibadah-box p {
    margin: 2px 0; 
}

 
    </style>
</head>

<body>
    <div class="header">
        <img src="img/simara.svg" width="45px" height="45px" />
        <h3>KUA PUSAKA KARAWANG BARAT</h3>
        <p>Sistem Manajemen Data Religi dan Agama</p>
        <div class="navbar">
            <a href="beranda.php" id="li">Beranda</a>
            <a href="#" id="li">Tentang</a>
            <div class="dropdown">
                <a href="#" class="dropdown-btn" id="li">Layanan</a>
                <div class="dropdown-content">
                    <a href="#" id="link">Suscatin</a>
                    <a href="#" id="link">Wakaf</a>
                    <a href="#" id="link">Tempat Ibadah</a>
                    <a href="#" id="link">Madrasah</a>
                </div>
            </div>
            <a href="#" id="li">Program</a>
            <a href="#" id="li">Bantuan</a>
        </div>
        <div class="login_staff">
            <a href="#">Masuk</a>
        </div>
    </div>

    <div class="banner">
        <img src="img/dotted.svg" style="width: 500px; margin-top: -5.5rem" />
        <img src="img/ibadah banner.svg" style="float: right; width: 570px" />
        <div class="text_KUA" style="width: 35rem">
            <h1>Tempat Ibadah Antar Umat Beragama di Karawang Barat</h1>
            <br />
        </div>
        <input type="search" placeholder="Masukan nama tempat atau lokasi" class="search-input" />
        <img src="img/search.png" style="position: absolute; width: 20px; margin-top: 3.8rem; left: 11%" />

        <div class="filter">
    <button onclick="filterData('')">Semua</button>
    <button onclick="filterData('Masjid')">Masjid</button>
    <button onclick="filterData('Gereja')">Gereja</button>
    <button onclick="filterData('Klenteng')">Klenteng</button>
    <button onclick="filterData('Vihara')">Vihara</button>
</div>
    </div>

    <div id="tempat-ibadah" class="tempat-ibadah-container">
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="tempat-ibadah-box">
            <img src="<?php echo $row['foto']; ?>" alt="<?php echo $row['nama']; ?>" width="100" height="100">
            <h3><?php echo $row['nama']; ?></h3>
            <p><?php echo $row['alamat']; ?></p>
            <p><?php echo $row['jenis']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>

    <footer>
        <img src="img/whatsapp 2.svg" style="position: absolute; margin-top: -45px; right: 11%" />
        <div class="footer_kanan">
            <img src="img/logo simara.png" width="180px" style="position: absolute; right: 81%; margin-top: -35px" />
            <img src="img/logo kua.svg" width="90px" style="margin-left: 120px" />
            <h2 style="font-family: 'Varela Round', sans-serif; padding-top: 20px">Kantor Urusan Agama Kecamatan Karawang Barat</h2>
            <p>Jl. Panatayuda 1, Nagasari, Karawang Barat, Nagasari, Karawang, Jawa Barat 41312</p>
            <p>Jam Pelayanan : <br />Senin - Jumat 07:30 s/d 16:00</p>
        </div>
        <div class="footer_kiri">
            <div class="beranda">
                <h3>Beranda</h3>
                <ul>
                    Kategori
                </ul>
                <ul>
                    Alur Nikah
                </ul>
                <ul>
                    Pusat Informasi
                </ul>
            </div>
            <div class="layanan">
                <h3>Layanan</h3>
                <ul>
                    Pranikah
                </ul>
                <ul>
                    Pernikahan
                </ul>
                <ul>
                    Wakaf
                </ul>
            </div>
            <div class="bantuan">
                <h3>Bantuan</h3>
                <ul>
                    Syarat & Ketentuan
                </ul>
                <ul>
                    Kebijakan Privasi
                </ul>
                <ul>
                    Panduan
                </ul>
                <ul>
                    FAQ
                </ul>
            </div>
            <div class="hubungi_kami">
                <h3>Hubungi Kami</h3>
                <ul>
                    Kontak Kami
                </ul>
                <img src="img/pesan.svg" style="padding-top: 10px; padding-right: 20px" />
                <img src="img/call.svg" alt="" />
            </div>
        </div>
    </footer>

    <script>
        function filterData(jenis) {
            window.location.href = 'tempat_ibadah.php?filter=' + encodeURIComponent(jenis);
        }
        
    </script>
</body>
</html>

<?php $mysqli->close(); ?>
