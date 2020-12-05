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
?>