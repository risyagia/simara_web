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
