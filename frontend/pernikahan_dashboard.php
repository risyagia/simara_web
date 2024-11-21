<?php
include_once '../backend/function.php';

if (isset($_POST['simpan'])) {
    $periode = mysqli_real_escape_string($koneksi, $_POST['periode']);
    $pernikahan = mysqli_real_escape_string($koneksi, $_POST['pernikahan']);
    $isbat_nikah = mysqli_real_escape_string($koneksi, $_POST['isbat_nikah']);

    // Insert query
    $query = "INSERT INTO pernikahan (periode, pernikahan, isbat_nikah) 
              VALUES ('$periode', '$pernikahan', '$isbat_nikah')";
    
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
$query = "SELECT * FROM pernikahan";
$result = mysqli_query($koneksi, $query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatitble" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pernikahan</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style_pernikahan_dashboard.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>






        /* Wrapper Modal */
 /* Gaya untuk tampilan modal */
 .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Gaya konten modal */
        .modal-content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Gaya ikon modal */
        .modal-icon {
            margin-bottom: 15px;
        }

        /* Gaya tombol */
        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-batal, .btn-ya {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
        }

        .btn-batal {
            background-color: #ff3d00;
        }

        .btn-ya {
            background-color: #4caf50;
        }


    
      .modal {
        display: none; 
        position: fixed;
        z-index: 1; 
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.4); 
      }

      .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        border-radius: 10px;
        font-family: Arial, sans-serif;
      }

      /* Close Button */
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }

      /* Form Styles */
      .modal h2 {
        color: #3b3e51;
        font-family: "Poppins", sans-serif;
      }

      .modal-content label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
      }

      .modal-content select,
      .modal-content input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
      }

      .modal-buttons {
        margin-top: 20px;
        text-align: center;
      }

      .modal-buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
      }

      #btn-batal {
        background-color: #ff0000;
        color: white;
      }

      #btn-simpan {
        background-color: #4caf50;
        color: white;
        margin-left: 10px;
      }
    </style>

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
                    <a href="tempat_ibadah_dashboard.php">
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
                    <button id="openModalBtn"><ion-icon name="add-circle-outline" style="cursor: pointer;"></ion-icon>Tambah</button>
                </div>
                <!-- Modal Structure -->
                <div id="modal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Tambah Data Pernikahan</h2>
        <form method="POST" action="">
        <label for="periode">Periode:</label>
          <input type="date" id="periode" name="periode" placeholder="YYYYMM" required />

          <label for="pernikahan">Pernikahan:</label>
          <input type="number" id="pernikahan" name="pernikahan" required />

          <label for="isbat_nikah">Isbat Nikah:</label>
          <input type="number" id="isbat_nikah" name="isbat_nikah" required />

          <div class="modal-buttons">
            <button type="button" id="btn-batal" onclick="closeModal()">Batal</button>
            <button type="submit" name="simpan" id="btn-simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
<!-- Modal Konfirmasi Hapus -->

<!-- Modal Konfirmasi Hapus -->
<div id="modalKonfirmasiHapus" class="modal">
    <div class="modal-content">
        <div class="modal-icon">
            <ion-icon name="alert-circle" style="font-size: 80px; color: #ff3d00;"></ion-icon>
        </div>
        <h2>Yakin Ingin Hapus?</h2>
        <p>Data ini akan dihapus secara permanen.</p>
        <div class="modal-buttons">
            <button id="btnCancelDelete" class="btn-batal">Batal</button>
            <button id="btnConfirmDelete" class="btn-ya">Ya</button>
        </div>
    </div>
</div>

                <table>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Pernikahan</th>
                        <th>Isbat Nikah</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                    <tr>
                        <td><?php echo  $no; ?></td>
                        <td><?php echo $row['periode']; ?></td>
                        <td><?php echo $row['pernikahan']; ?></td>
                        <td><?php echo $row['isbat_nikah']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'];?>"><ion-icon name="create-outline" class="icon-edit"></ion-icon></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"><ion-icon name="trash-outline" class="icon-delete" style="cursor: pointer;"></ion-icon></a>
                        </td>
                    </tr>
                    <?php $no++; endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
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
    <script>
        // Inisialisasi chart ketika halaman selesai dimuatt
        window.onload = function() {
            const ctx1 = document.getElementById('barChart').getContext('2d');
            const barChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels:  ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                        label: 'Pernikahan',
                        data: [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70], 
                        backgroundColor: "#F3CD00",
                        borderColor: "#F3CD00",
                        borderWidth: 1,
                    },
                {
                    label: 'Isbat Nikah',
                        data: [5, 10, 15, 20, 25, 20, 30, 35, 45, 40, 50, 55],
                        backgroundColor: "#3B3E51",
                        borderColor: "#3B3E51",
                        borderWidth: 1
                }
                
                ]

                    
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Data Pernikahan & Isbat Nikah Tahun Ini',
                            font: {
                                size: 18
                            },
                            color: "#3b3e51"
                        },
                        legend: {
                            position: 'top',
                            labels: {
                                boxWidth: 20,
                                color: "#3b3e51"
                            }
                        }
                    },
                    scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Periode'
                        }
                    }
                }
            }
        });

        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ["2019", "2020", "2021", "2022", "2023"],
                datasets: [
                    {
                        label: 'Nikah',
                        data: [200, 300, 400, 500, 600],
                        backgroundColor:"rgba(54, 162, 235, 0.2)",
                        borderColor: "#F3CD00",
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'Isbat Nikah',
                        data: [150, 250, 350, 450, 550],
                        backgroundColor: "rgba(59, 62, 81, 0.2)", // Warna dengan transparansi
                        borderColor: "#3B3E51",
                        borderWidth: 2,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Data Pernikahan & Isbat Nikah dalam Kurun Waktu 5 Tahun Terakhir',
                        font: {
                            size: 18
                        },
                        color: "#3B3E51"
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth: 20,
                            color: "#3B3E51"
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                }
            }
        });
    
};

      document.getElementById("openModalBtn").onclick = function () {
        document.getElementById("modal").style.display = "block";
      };

      function closeModal() {
        document.getElementById("modal").style.display = "none";
      }

      window.onclick = function (event) {
        if (event.target === document.getElementById("modal")) {
          closeModal();
        }
      };



    // Elemen modal dan tombol
    const modalKonfirmasi = document.getElementById("modalKonfirmasiHapus");
        const btnBatalHapus = document.getElementById("btnCancelDelete");
        const btnConfirmDelete = document.getElementById("btnConfirmDelete");

        // ID data yang akan dihapus
        let dataIdToDelete = null;

        // Fungsi untuk menampilkan modal
        function showConfirmationModal(id) {
            dataIdToDelete = id;  // Set ID yang ingin dihapus
            modalKonfirmasi.style.display = "flex";
        }

        // Fungsi untuk menutup modal
        function closeConfirmationModal() {
            modalKonfirmasi.style.display = "none";
        }

        // Event listener untuk tombol batal
        btnBatalHapus.onclick = closeConfirmationModal;

        // Event listener untuk tombol konfirmasi hapus
        btnConfirmDelete.onclick = function () {
            if (dataIdToDelete) {
                // Lakukan penghapusan dengan AJAX
                fetch(`hapus.php?id=${dataIdToDelete}`)
                    .then(response => response.text())
                    .then(data => {
                        if (data.includes('Hapus Error')) {
                            alert('Penghapusan gagal: ' + data);
                        } else {
                            window.location.href = 'pernikahan.php';
                        }
                    })
                    .catch(error => console.error('Error:', error));
                
                closeConfirmationModal();
            }
        };

         // JQuery Ajaz yang menghandle submission 
         $(document).ready(function() {
    $('#form-pernikahan').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: 'pernikahan.php', // The same page, but handling via AJAX
            method: 'POST',
            data: formData,
            success: function(response) {
                // After submission, reload data for display
                fetchData();
            },
            error: function() {
                alert('Error saving data');
            }
        });
    });
});



    
    </script>




    <script src="js/pernikahan.js"></script>
    <script></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</body>

<<<<<<< HEAD:frontend/pernikahan.php
</html>
=======
</html>

</html>

</html>
>>>>>>> 3835a0a8b972cf5ed20ab5fd4e4f6e78b386c75c:frontend/pernikahan_dashboard.php
