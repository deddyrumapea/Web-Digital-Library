<?php 
require 'database/inc.php';

if (isset($_POST["btn-login"])) {
	$username = strEscape($_POST["username"]);
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			echo "
			<script>
				alert('Welcome, $username!');
				document.location = 'index.php';
			</script>";
		} else {
			echo "
			<script>
				alert('Password salah!');
			</script>";
		}
	} else {
		echo "
		<script>
			alert('Akun dengan username \'$username\' tidak ditemukan!');
		</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Digital Library</title>
	<link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
	<div class="auth-box">

		<!-- LOGIN FORM START -->
		<div class="auth-form-container">
			<h2>Login</h2>
			<div>
				<form action="" method="post" class="auth-form">
					<input type="username" placeholder="Username" name="username" required>
					<input type="password" placeholder="Password" name="password" required>
					<button type="submit" name="btn-login" class="btn-auth">Login</button>
				</form>
				<br>
				<a href="sign_up.php">Don't have an account yet? Create one.</a>
			</div>
		</div>
		<!-- LOGIN FORM END -->

		<!-- SIDE CONTENT START -->
		<div class="auth-side-container">
			<h2>Digital Library</h2>
			<p>Login using your account to access digital library.</p>
		</div >
		<!-- SIDE CONTENT END -->
	</div>

</body>
</html>