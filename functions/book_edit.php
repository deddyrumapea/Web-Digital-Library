<?php 
require '../database/inc.php';

if (isset($_POST["submit-edit"])) {
	$id = htmlspecialchars($_POST["id"]);
	$cover = htmlspecialchars($_POST["cover"]);
	$title = htmlspecialchars($_POST["title"]);
	$author = htmlspecialchars($_POST["author"]);
	$publisher = htmlspecialchars($_POST["publisher"]);
	$year = htmlspecialchars($_POST["year"]);
	$pages = htmlspecialchars($_POST["pages"]);

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