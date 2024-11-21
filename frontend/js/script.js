$(document).ready(function () {
  // Function to fetch data every 5 seconds
  function fetchData() {
    $.ajax({
      url: "pernikahan.php", // Script to fetch the updated data
      method: "GET",
      dataType: "json", // Expecting JSON response
      success: function (response) {
        // Update the values on the page
        $("#total-pernikahan").text(response.total_pernikahan);
        $("#total-isbat").text(response.total_isbat);
      },
    });
  }

  // Fetch data immediately on page load
  fetchData();

  // Fetch data every 5 seconds (5000 milliseconds)
  setInterval(fetchData, 5000);

  // Handle form submission using AJAX
  $("#form-pernikahan").on("submit", function (e) {
    e.preventDefault(); // Prevent form from submitting normally

    var formData = $(this).serialize(); // Serialize the form data

    $.ajax({
      url: "pernikahan.php", // Same page as the action URL
      method: "POST",
      data: formData,
      success: function (response) {
        // Update displayed data with the new totals from the response
        var data = JSON.parse(response);
        $("#total-pernikahan").text(data.total_pernikahan);
        $("#total-isbat").text(data.total_isbat);
      },
    });
  });
});
