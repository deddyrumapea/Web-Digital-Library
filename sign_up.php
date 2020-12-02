<?php 
require 'database/inc.php';

if (isset($_POST["sign-up-btn"])) {
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$email = $_POST["email"];
	$address = $_POST["address"];

	mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password', '$email', '$address')");
	if (mysqli_affected_rows($conn) === 1) {
		echo "
		<script>
			alert('Welcome, $username!');
			document.location = 'index.php';
		</script>";
	} else {
		echo "<script>alert('Registration failed! Please try again.')</script>";
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

		<!-- SIGN UP FORM START -->
		<div class="auth-form-container">
			<h2>Sign Up</h2>
			<div>
				<form action="" method="post" class="auth-form">
					<input name="username" type="username" placeholder="Username" required>
					<input name="email" type="email" placeholder="Email"  required>
					<textarea name="address" placeholder="Address" cols="0" rows="4" required></textarea>
					<input name="password" id="password" autocomplete="new-password" type="password" placeholder="Password" required>
					<input id="password-confirm" autocomplete="new-password" onkeyup="checkPassword()" type="password" placeholder="Confirm Password" required>
					<button id="btn-sign-up" name="sign-up-btn" type="submit" class="btn-auth">Sign Up</button>
				</form>
				<br>
				<a href="login.php">Already have an account? Login.</a>
			</div>
		</div>
		<!-- SIGN UP FORM END -->

		<!-- SIDE CONTENT START -->
		<div class="auth-side-container">
			<h2>Digital Library</h2>
			<p>Create an account to start accessing digital library.</p>
		</div >
		<!-- SIDE CONTENT END -->
	</div>

	<script type="text/javascript" src="assets/js/sign_up.js"></script>
</body>
</html>