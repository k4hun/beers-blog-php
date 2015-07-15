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
		<h2>Styles index</h2>
		<?php 
			require_once '../../models/style.php';
		?>
		<h3><a href="add.php">Add new style</a></h3>
		<div class="col-md-8">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Beers</th>
					<th>Actions</th>
				</tr>
				<?php 
					$styles = Style::getAll();
						foreach($styles as $style) {
							$beers = Style::getBeers($style->id);
							echo "<tr>";
							echo "<td>$style->id</td>";
							echo "<td>$style->name</td>";
							echo "<td>$style->description</td>";
							echo "<td>" . count($beers) . "</td>";
							echo "<td>
									<form action='update.php?id=$style->id' method='POST'>
										<input type='hidden' name='name' value=\"$style->name\">
										<input type='hidden' name='description' value=\"$style->description\">
										<input type='submit' value='Edit' class='btn btn-warning'>
									</form>
						 			<a href='delete.php?id=$style->id' class='btn btn-danger'>Delete</a>
							 	</td>";
							echo "</tr>";
						}
				?>
			</table>
		</div>
	</div>	
</body>

</html>