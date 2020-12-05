<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require '../database/inc.php';

if (isset($_POST["submit-edit"])) {
	if (submitEdit()) {
		echo "<script>alert('Book edited successfully')</script>";
	} else {
		echo "<script>alert('Something went wrong')</script>";
	}
	echo "<script>location.replace('../index.php');</script>";
}

function submitEdit() {
	global $conn;

	$id = strEscape($_POST["id"]);
	$title = strEscape($_POST["title"]);
	$author = strEscape($_POST["author"]);
	$publisher = strEscape($_POST["publisher"]);
	$year = strEscape($_POST["year"]);
	$pages = strEscape($_POST["pages"]);
	$oldCover = strEscape($_POST["old-cover"]);

	if ($_FILES["cover"]["error"] === 4) {
		$cover = $oldCover;
	} else {
		// Upload cover image
		$cover = uploadCoverImage();
		if (!$cover) {
			return false;
		}
	}

	$query = "UPDATE book SET cover_img='$cover', title='$title', author='$author', publisher='$publisher', year='$year', pages='$pages' WHERE id='$id'";
	return mysqli_query($conn, $query);
}
?>