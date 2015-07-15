<?php 
	require('../session/check_user.php');
	require_once '../../models/brewery.php';
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$brewery = new Brewery();
		if($brewery->delete($id)) {
			header ('location: index.php');
			die();
		}
	}

?>