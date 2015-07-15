<?php	
	session_start();
	if(!isset($_SESSION['user'])) {
		header("Location: /beers-blog-php/admin/session/login.php");
		die();
	}
?>