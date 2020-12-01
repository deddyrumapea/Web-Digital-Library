<?php  
try {
	$db = new pdo('mysql:host=localhost;dbname=digital_library;charset=utf8','root', '');
} catch (Exception $e) {
	die($e->getMessage());
}
?>