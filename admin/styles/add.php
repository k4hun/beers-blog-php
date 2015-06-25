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
		<h2>Add style</h2>
		<?php 
			require_once '../../models/style.php';
		?>
		<form id='new-style-form' action='', method='POST'>
			<div class="col-md-8">
				<table class="table table-striped">
					<tr>
						<th>Name:</th>
						<td><input type='text', name='name', class='form-control'></td>
					</tr>
					<tr>
						<th>Description:</th>
						<td><textarea name='description' form='new-style-form' class='form-control'></textarea></td>
					</tr>
				</table>
				<input type='submit', value='Add' class='btn btn-primary'>
				<a class='btn btn-warning' href="index.php">Back</a>
			</div>
		</form>

		<?php 

			if(isset($_POST['name']) && isset($_POST['description'])) {
				$name = $_POST['name'];
				$description = $_POST['description'];
				$style = new Style();
				if($style->insert($name, $description)) {
					header ('location: index.php');
				}
			}

		?>
	</div>
			
</body>

</html>