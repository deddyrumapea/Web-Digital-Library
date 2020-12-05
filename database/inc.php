<?php  
$conn = mysqli_connect("localhost", "root", "", "digital_library");

function queryRead($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function strEscape($string) {
	global $conn;
	return mysqli_real_escape_string($conn, htmlspecialchars($string));
}

function uploadCoverImage() {
	$fname = $_FILES["cover"]["name"];
	$fsize = $_FILES["cover"]["size"];
	$ftemp = $_FILES["cover"]["tmp_name"];
	$error = $_FILES["cover"]["error"];
	$fext = explode('.', $fname);
	$fext = strtolower(end($fext));

	// ##### FILE CHECKING START ######
	// Check if there is an image uploaded
	if ($error === 4) {
		echo "<script>alert('Please upload a cover image')</script>";
		return false;
	}

	// Check if the file is an image file
	$validExt = ['jpg', 'jpeg', 'png'];
	if (!in_array($fext, $validExt)) {
		echo "<script>alert('Cover image file format is not supported!')</script>";
		return false;
	}

	// Check if size is bigger than 2MB
	if ($fsize > 2000000) {
		echo "<script>alert('Cover image file size is too big! (Limit : 2MB)')</script>";
		return false;
	}
	// ##### FILE CHECKING END #####

	$fpath = 'assets/images/'.uniqid().'.'.$fext;
	move_uploaded_file($ftemp, '../'.$fpath);
	return $fpath;
}
?>