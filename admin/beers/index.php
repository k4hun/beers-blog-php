<?php require('../session/check_user.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Beers</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
><!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<?php include('../menu_top.php'); ?>
		<h2>Beers index</h2>
		<?php 
			require_once '../../models/beer.php';
		?>
		<h3><a href="add.php">Add new beer</a></h3>
		<div class="col-md-8">
			<table class="table table-striped">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Style</th>
					<th>Brewery</th>
					<th>Rating</th>
					<th>Photo</th>
					<th>Actions</th>
				</tr>
				<?php 
					$beers = Beer::getAll();
						foreach($beers as $beer) {
						$brewery = Beer::getBrewery($beer->brewery_id);
						$style = Beer::getStyle($beer->style_id);
							echo "<tr>";
							echo "<td>$beer->id</td>";
							echo "<td>$beer->name</td>";
							echo "<td>$beer->description</td>";
							echo "<td>$style->name</td>";							
							echo "<td>$brewery->name</td>";
							echo "<td>$beer->rating</td>";
							echo "<td><img height='150' width='100' src='../../uploads/". $beer->photo_url ."'</img></td>";
							echo "<td>
									<form action='update.php?id=$beer->id' method='POST'>
										<input type='hidden' name='name' value=\"$beer->name\">
										<input type='hidden' name='description' value=\"$beer->description\">
										<input type='hidden' name='style_id' value=\"$beer->style_id\">
										<input type='hidden' name='brewery_id' value=\"$beer->brewery_id\">										
										<input type='hidden' name='rating' value=\"$beer->rating\">
										<input type='submit' value='Edit' class='btn btn-warning'>
									</form>
						 			<a href='delete.php?id=$beer->id' class='btn btn-danger'>Delete</a>
							 	</td>";
							echo "</tr>";
						}
				?>
			</table>
		</div>
	</div>	
</body>

</html>