<?php 
	require('../session/check_user.php');
	require_once '../../models/style.php';
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$style = new Style();
		if($style->delete($id)) {
			header ('location: index.php');
		}
	}

?>