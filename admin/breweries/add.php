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
		<h2>Add brewery</h2>
		<?php 
			require_once "../../models/brewery.php"; 
		?>
		<form action='', method='POST'>
			<div class="col-md-8">
				<table class="table table-striped">
					<tr>
						<th>Name:</th>
						<td><input type='text', name='name', class='form-control'></td>
					</tr>
				</table>
				<input type='submit', value='Add' class='btn btn-primary'>
				<a class='btn btn-warning' href="index.php">Back</a>
			</div>
		</form>

		<?php 

			if(isset($_POST['name'])) {
				$name = $_POST['name'];
				$brewery = new Brewery();
				if($brewery->insert($name)) {
					header ('location: index.php');
					die();
				}
			}

		?>
	</div>
			
</body>

</html>