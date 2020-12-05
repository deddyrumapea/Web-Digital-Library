<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require '../database/inc.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];

	$query = "DELETE FROM book WHERE id='$id'";
	$result = mysqli_query($conn, $query);

	if ($result) {
		echo "<script>alert('Book deleted successfully')</script>";
	} else {
		echo "<script>alert('Something went wrong')</script>";
	}
	echo "<script>location.replace('../index.php');</script>";
}

?>