// Inisialisasi chart ketika halaman selesai dimuatt
window.onload = function () {
  const ctx1 = document.getElementById("barChart").getContext("2d");
  const barChart = new Chart(ctx1, {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
      datasets: [
        {
          label: "Pernikahan",
          data: [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70],
          backgroundColor: "#F3CD00",
          borderColor: "#F3CD00",
          borderWidth: 1,
        },
        {
          label: "Isbat Nikah",
          data: [5, 10, 15, 20, 25, 20, 30, 35, 45, 40, 50, 55],
          backgroundColor: "#3B3E51",
          borderColor: "#3B3E51",
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: "Data Pernikahan & Isbat Nikah Tahun Ini",
          font: {
            size: 18,
          },
          color: "#3b3e51",
        },
        legend: {
          position: "top",
          labels: {
            boxWidth: 20,
            color: "#3b3e51",
          },
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "Jumlah",
          },
        },
        x: {
          title: {
            display: true,
            text: "Periode",
          },
        },
      },
    },
  });

  const ctxLine = document.getElementById("lineChart").getContext("2d");
  const lineChart = new Chart(ctxLine, {
    type: "line",
    data: {
      labels: ["2019", "2020", "2021", "2022", "2023"],
      datasets: [
        {
          label: "Nikah",
          data: [200, 300, 400, 500, 600],
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          borderColor: "#F3CD00",
          borderWidth: 2,
          fill: true,
        },
        {
          label: "Isbat Nikah",
          data: [150, 250, 350, 450, 550],
          backgroundColor: "rgba(59, 62, 81, 0.2)", // Warna dengan transparansi
          borderColor: "#3B3E51",
          borderWidth: 2,
          fill: true,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: "Data Pernikahan & Isbat Nikah dalam Kurun Waktu 5 Tahun Terakhir",
          font: {
            size: 18,
          },
          color: "#3B3E51",
        },
        legend: {
          position: "top",
          labels: {
            boxWidth: 20,
            color: "#3B3E51",
          },
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "Jumlah",
          },
        },
        x: {
          title: {
            display: true,
            text: "Tahun",
          },
        },
      },
    },
  });
};
