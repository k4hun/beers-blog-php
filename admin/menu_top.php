<ul class='nav nav-tabs'>
	<li><a href="../breweries">Breweries</a></li>
	<li><a href="../styles">Styles</a></li>
	<li><a href="../beers">Beers</a><li>
	<?php 
		if(isset($_SESSION['user'])){
			echo '<li><a href="/beers-blog-php/admin/session/logout.php">Log out</a><li>';
			echo '</ul>';
			echo '<br>';
			require('session/check_admin.php');
		} else {
			echo '<li><a href="/beers-blog-php/admin/session/login.php">Log in</a><li>';
		}	
	?>	
</ul>