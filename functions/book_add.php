<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require '../database/inc.php';

if (isset($_POST["submit-add"])) {	
	if (submitBook()) {
		echo "<script>alert('Book added successfully')</script>";
	} else {
		echo "<script>alert('Something went wrong')</script>";
	}
	echo "<script>location.replace('../index.php');</script>";
}

function submitBook() {
	global $conn;

	$id = strEscape($_POST["id"]);
	$title = strEscape($_POST["title"]);
	$author = strEscape($_POST["author"]);
	$publisher = strEscape($_POST["publisher"]);
	$year = strEscape($_POST["year"]);
	$pages = strEscape($_POST["pages"]);

	// Upload cover image
	$cover = uploadCoverImage();
	if (!$cover) {
		return false;
	}

	$query = "INSERT INTO book VALUES ('$id', '$title', '$author', '$publisher', $year, $pages, '$cover')";
	return mysqli_query($conn, $query);
}
?>