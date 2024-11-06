//menambahkankan hover pada klik menu
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}
list.forEach((item) => item.addEventListener("mouseover", activeLink));
// menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
// Data for this year (bar chart) - Monthly data from January to December
const barChartData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
  datasets: [
    {
      label: "Nikah",
      data: [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70], // Example monthly data for Nikah
      backgroundColor: "#F3CD00",
      borderColor: "#F3CD00",
      borderWidth: 1,
    },
    {
      label: "Isbat Nikah",
      data: [5, 10, 15, 20, 10, 12, 18, 22, 25, 30, 35, 40], // Example monthly data for Isbat Nikah
      backgroundColor: "#31502C",
      borderColor: "#31502C",
      borderWidth: 1,
    },
  ],
};

// Bar chart configuration
const barConfig = {
  type: "bar",
  data: barChartData,
  options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: "Data Pernikahan & Isbat Nikah Tahun Ini", // Title text
        color: "#31502C", // Custom title color
        font: {
          size: 16,
          // Custom font size
        },
        align: "start",
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        max: 100,
      },
    },
  },
};

// Data for the last 5 years (line chart) - Data from 2019 to 2023
const lineChartData = {
  labels: ["2019", "2020", "2021", "2022", "2023"],
  datasets: [
    {
      label: "Nikah",
      data: [150, 200, 300, 400, 500], // Example data for Nikah over 5 years
      borderColor: "#F3CD00",
      backgroundColor: "rgba(54, 162, 235, 0.2)",
      fill: true,
      tension: 0.3,
    },
    {
      label: "Isbat Nikah",
      data: [100, 150, 250, 350, 450], // Example data for Isbat Nikah over 5 years
      borderColor: "#31502C",
      backgroundColor: "rgba(255, 99, 132, 0.2)",
      fill: true,
      tension: 0.3,
    },
  ],
};

// Line chart configuration
const lineConfig = {
  type: "line",
  data: lineChartData,
  options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: "Data Pernikahan & Isbat Nikah dalam Kurun Waktu 5 Tahun Terakhir", // Title text
        color: "#31502C", // Custom title color
        font: {
          size: 16, // Custom font size
        },
        align: "start",
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        max: 1000,
      },
    },
  },
};

// Render charts
const barChart = new Chart(document.getElementById("barChart"), barConfig);

const lineChart = new Chart(document.getElementById("lineChart"), lineConfig);
/// Get elements
const modal = document.getElementById("modal-popup");
const btnTambah = document.getElementById("btn-tambah");
const closeModal = document.querySelector(".close-modal");
const btnBatal = document.getElementById("btn-batal");
const btnSimpan = document.getElementById("btn-simpan");
const form = document.querySelector("form");
const inputs = form.querySelectorAll("input");
const btnDelete = document.getElementById("btn-delete");

// Fungsi untuk mengecek apakah semua input sudah diisi
function checkInputs() {
  let allFilled = true;

  inputs.forEach((input) => {
    if (input.value.trim() === "") {
      allFilled = false;
    }
  });

  // Jika semua input terisi, enable tombol Simpan dan Batal
  if (allFilled) {
    btnSimpan.classList.remove("disabled");
    btnBatal.classList.remove("disabled");
    btnSimpan.disabled = false;
    btnBatal.disabled = false;
  } else {
    btnSimpan.classList.add("disabled");
    btnBatal.classList.add("disabled");
    btnSimpan.disabled = true;
    btnBatal.disabled = true;
  }
}
modal.style.display = "none";

btnTambah.onclick = function () {
  modal.style.display = "flex";
  checkInputs();
};

function closeModalTambah() {
  modal.style.display = "none";
}

// Tambahkan event listener untuk tombol "Close" dan "Batal"
if (closeModal) {
  closeModal.onclick = closeModalTambah;
}
if (btnBatal) {
  btnBatal.onclick = closeModalTambah;
}

// Cek setiap kali ada perubahan pada input
inputs.forEach((input) => {
  input.addEventListener("input", checkInputs);
});

// Ketika tombol "Simpan" diklik, modal juga bisa ditutup setelah submit (opsional)
form.onsubmit = function (event) {
  event.preventDefault(); // Anda bisa menghapus ini jika ingin form benar-benar submit
  if (!btnSimpan.classList.contains("disabled")) {
    modal.style.display = "none";
  }
};

// Ambil elemen modal dan tombol
const modalKonfirmasi = document.getElementById("modal-konfirmasi");
const closeModalKonfirmasi = document.querySelector(".close-modal-konfirmasi");
const btnBatalHapus = document.getElementById("btn-batal-hapus");
const btnHapus = document.getElementById("btn-hapus");

// Fungsi untuk menampilkan modal
function showConfirmationModal() {
  modalKonfirmasi.style.display = "flex";
}

// Fungsi untuk menutup modal
function closeConfirmationModal() {
  modalKonfirmasi.style.display = "none";
}

// Tambahkan event listener ke setiap ikon hapus
const deleteIcons = document.querySelectorAll(".icon-delete");
deleteIcons.forEach((icon) => {
  icon.addEventListener("click", showConfirmationModal);
});

// Tambahkan event listener untuk tombol "X" dan "Batal"
if (closeModalKonfirmasi) {
  closeModalKonfirmasi.onclick = closeConfirmationModal;
}
if (btnBatalHapus) {
  btnBatalHapus.onclick = closeConfirmationModal;
}

// Fungsi untuk tombol hapus (tambahkan logika hapus sesuai kebutuhan)
if (btnHapus) {
  btnHapus.onclick = function () {
    console.log("Item deleted!"); // Placeholder untuk logika hapus
    closeConfirmationModal(); // Tutup modal setelah menghapus
  };
}
