<?php 
	require('../session/check_user.php');
	require_once '../../models/beer.php';
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$beer = new Beer();
		if($beer->delete($id)) {
			header ('location: index.php');
		}
	}

?>