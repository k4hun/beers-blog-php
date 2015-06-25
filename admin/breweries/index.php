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
		<h2>Breweries index</h2>
		<?php 
			require_once "../../models/brewery.php";
		?>
		<h3><a href="add.php">Add new brewery</a></h3>
		<div class="col-md-8">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Beers</th>
					<th>Actions</th>
				</tr>
				<?php 
					$breweries = Brewery::getAll();
						foreach($breweries as $brewery) {
							$beers = Brewery::getBeers($brewery->id);
							echo "<tr>";
							echo "<td>$brewery->id</td>";
							echo "<td>$brewery->name</td>";
							echo "<td>". count($beers) . "</td>";
							echo "<td>
									<form action='update.php?id=$brewery->id' method='POST'>
										<input type='hidden' name='name' value=\"$brewery->name\">
										<input type='submit' value='Edit' class='btn btn-warning'>
									</form>
							 		<a href='delete.php?id=$brewery->id' class='btn btn-danger'>Delete</a>
							 	</td>";
							echo "</tr>";
						}
				?>
			</table>
		</div>
	</div>	
</body>

</html>