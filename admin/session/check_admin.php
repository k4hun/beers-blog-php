<?php	
	if(($_SESSION['admin'] != 1)) {
		die("<div class='alert alert-info col-md-8'>For admin only!</div>");
	}
?>