<?php 
	session_start();
	session_destroy();
	header('Location: /beers-blog-php/admin/session/login.php');
?>