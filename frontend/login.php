<?php 
session_start();
include_once '../backend/function.php';

// proses_login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    //$cekdatabase untuk nyambungin ke database
    $cekdatabase = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    //kemudian hitung apakah ada di database di tabel login dari si ursename dan password yang cocok
    $hitung = mysqli_num_rows($cekdatabase);
    $cekdata = mysqli_query($koneksi, "SELECT * FROM login where username='$username' AND password='$password'");    
    if ($hitung > 0) {
      $_SESSION['log'] = 'True';
      $_SESSION['username'] = '$username';
      $_SESSION['login_time'] = time();
        header('location:dashboard.php');
    } else {
        header('location:login.php');
    };
};



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0" />
		<title>Login - Sistem Manajemen Data</title>
		<link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"  />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
			rel="stylesheet" />
			<link rel="shortcut icon" href="img/simara.png" type="image/x-icon">
		<link rel="stylesheet"href="css/login.css" />
	</head>
	<body>
		<div class="container">
			<div class="login-box">
				<div class="login-content">
					<img
						src="img/simara.png"
						alt="Logo"
						class="logo" />
					<h1>Sistem Manajemen Data Religi & Agama</h1>
					<?php if (isset($_GET['session_expired'])): ?>
        <p>Sesi Anda telah berakhir. Silakan login kembali.</p>
         <?php endif; ?>

					<form id="loginForm" method="post" autocomplete="off">
						<h4>Email Atau No Telepon</h4>
						<div class="input-box">
							<input id="username"name="username"type="text"placeholder="Masukan Username"required autocomplete="off"/>
						</div>
						<h4>Kata Sandi</h4>
						<div class="input-box">
							<input id="password"name="password" type="password"placeholder="Masukkan Kata Sandi" required autocomplete="off" />
							<span class="password-icon"></span>
						</div>
						<button id="submitButton" name="login" type="submit"class="login-btn" >Masuk</button>
					</form>
					<div class="footer">
						<img
							src="img/iklas_beramal-removebg-preview 2.png"
							alt="KUA Logo"
							class="kua-logo" />
						<p>Kantor Urusan Agama Kecamatan Karawang Barat</p>
					</div>
				</div>
			</div>
			<div class="image-box">
				<img
					src="img/Frame.png"
					alt="KUA Building" />
			</div>
		</div>

		<!-- Add JavaScript to control the form -->
		<script>
			// Get the form elements
			const usernameInput = document.getElementById("username");
			const passwordInput = document.getElementById("password");
			const submitButton = document.getElementById("submitButton");

			// Function to check if both fields are filled
			function checkForm() {
				// If both fields have values, enable the button
				if (
					usernameInput.value.trim() !== "" &&
					passwordInput.value.trim() !== ""
				) {
					submitButton.disabled = false;
					submitButton.style.backgroundColor = "#31502c"; // Change button color
				} else {
					submitButton.disabled = true;
					submitButton.style.backgroundColor = "#799e7e"; // Default color
				}
			}

			// Add event listeners to the input fields
			usernameInput.addEventListener("input", checkForm);
			passwordInput.addEventListener("input", checkForm);
		</script>
	</body>
</html>