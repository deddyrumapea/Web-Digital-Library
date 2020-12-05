<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require '../database/inc.php';

if (isset($_POST["submit-edit"])) {
	$id = strEscape($_POST["id"]);
	$cover = strEscape($_POST["cover"]);
	$title = strEscape($_POST["title"]);
	$author = strEscape($_POST["author"]);
	$publisher = strEscape($_POST["publisher"]);
	$year = strEscape($_POST["year"]);
	$pages = strEscape($_POST["pages"]);

	$query = "UPDATE book SET cover_img='$cover', title='$title', author='$author', publisher='$publisher', year='$year', pages='$pages' WHERE id='$id'";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		echo "<script>alert('Book edited successfully')</script>";
	} else {
		echo "<script>alert('Something went wrong')</script>";
	}
	echo "<script>location.replace('../index.php');</script>";
}
?>