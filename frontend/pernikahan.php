<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatitble" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pernikahan</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style_pernikahan.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <!-- navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span><img src="img/logo simara no title.png" width="35px" style="margin-top: 10px; margin-left: 14px;"></span>
                        <h1 class="header">SiMaRa</h1>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><span class="iconify" data-icon="ion:home-outline" data-width="25" data-height="25"></span>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pernikahan.php">
                        <span class="icon"><span class="iconify" data-icon="carbon:partnership" data-width="25" data-height="25"></span></span>
                        <span class="title">Pernikahan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><span class="iconify" data-icon="carbon:worship-muslim" data-width="25" data-height="25"></span></span>
                        <span class="title">Tempat Ibadah</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">Madrasah</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><span class="iconify" data-icon="mdi:partnership-outline" data-width="25" data-height="25"></span></span>
                        <span class="title">Wakaf</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="title">Program</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
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
                <h1>Pendataan pernikahan & isbat-nikah di kecamatan karawang barat</h1>
            </div>
            <div class="details">
                <div class="chart1">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="chart2">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="table" >
                <div class="header-tabel"  >
                    <h1 style="font-size: 20PX; margin-top: 10px; color: #3B3E51; opacity: 60%; font-family: 'poppins', sans-serif; cursor:pointer ">Menampilkan Data Pernikahan & Isbat-nikah</h1>
                    <button id="btn-tambah"><ion-icon name="add-circle-outline" style="cursor: pointer;"></ion-icon>Tambah</button>
                </div>
                <!-- Modal Structure -->
                <div id="modal-popup" class="modal">
                    <div class="modal-content">
                        <div class="header-modal">
                            <span class="close-modal">&times;</span>
                            <h2 style="color: #3B3E51; font-family: 'poppins',sans-serif;">Tambah Data Pernikahan</h2>
                        </div>
                        <form>
                            <br><br>
                            <div class="modal-input">
                                <div class="input1">
                                    <label for="bulan">Bulan:</label>
                                    <select name="bulan" id="bulan" class="select">
                                        <option value="">Pilih Bulan</option>
                                        <option value="">Januari</option>
                                        <option value="">Februari</option>
                                        <option value="">Maret</option>
                                        <option value="">April</option>
                                        <option value="">Mei</option>
                                        <option value="">Juni</option>
                                        <option value="">Juli</option>
                                        <option value="">Agustus</option>
                                        <option value="">September</option>
                                        <option value="">Oktober</option>
                                        <option value="">November</option>
                                        <option value="">Desember</option>
                                    </select>
                                    <label for="tahun">Tahun:</label>
                                    <input type="number" id="tahun" name="tahun" required>
                                </div>
                                <div class="input2">
                                    <label for="pernikahan">Pernikahan:</label>
                                    <input type="number" id="pernikahan" name="pernikahan" required>
                                    <label for="isbat-nikah">Isbat Nikah:</label>
                                    <input type="number" id="isbat-nikah" name="isbat-nikah" required>
                                </div>
                            </div>
                            <div class="modal-buttons">
                                <button type="button" id="btn-batal">Batal</button>
                                <button type="submit" id="btn-simpan">Simpan</button>
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
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Pernikahan</th>
                        <th>Isbat Nikah</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mei</td>
                        <td>2024</td>
                        <td>50</td>
                        <td>20</td>
                        <td>
                            <ion-icon name="trash-outline" class="icon-delete" style="cursor: pointer;"></ion-icon>
                            <ion-icon name="create-outline" class="icon-edit"></ion-icon>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Juni</td>
                        <td>2024</td>
                        <td>35</td>
                        <td>10</td>
                        <td>
                            <ion-icon name="trash-outline" class="icon-delete" style="cursor: pointer;"></ion-icon>
                            <ion-icon name="create-outline" class="icon-edit"></ion-icon>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Juli</td>
                        <td>2024</td>
                        <td>60</td>
                        <td>15</td>
                        <td>
                            <ion-icon name="trash-outline" class="icon-delete" style="cursor: pointer;"></ion-icon>
                            <ion-icon name="create-outline" class="icon-edit"></ion-icon>
                        </td>
                    </tr>
                </table>
            </div>
            <script src="js/pernikahan.js"></script>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</body>

</html>

</html>

</html>