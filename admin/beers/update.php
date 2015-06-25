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
		<h2>Update beer</h2>
		<?php 
			require_once '../../models/beer.php';
			require_once '../../models/style.php';
			require_once '../../models/brewery.php';
		?>		
		<form id='new-style-form' action='', method='POST'>
			<div class="col-md-8">
				<table class="table table-striped">
					<tr>
						<th>Name:</th>
						<td>
							<input type='text' name='newName' value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class='form-control'>
							<input type='hidden' name='id' value="<?php echo $_GET['id'] ?>">
						</td>
					</tr>
					<tr>
						<th>Description:</th>
						<td><textarea name='description' form='new-style-form' class='form-control'><?php if(isset($_POST['description'])) echo $_POST['description']; ?>
							</textarea></td>
					</tr>
					<tr>
						<th>Style:</th>
						<td>
							<select name ='style_id' class='form-control'>
								<?php 
									$styles = Style::getAll();
									foreach($styles as $style) {
										echo "<option value=$style->id>$style->name</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>Brewery:</th>
						<td>
							<select name='brewery_id' class='form-control'>
								<?php 
									$breweries = Brewery::getAll();
									foreach($breweries as $brewery) {
										echo "<option value=$brewery->id>$brewery->name</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>Rating:</th>
						<td>
							<?php
								for($i=1; $i<=5; $i++) {
									echo "<div class='radio-inline'>";
									echo "<input type='radio' name='rating'";
									if ($i == $_POST['rating']) { echo "checked "; }
									echo "value='$i'>". $i;
									echo "</div>";
								}
							?>
						</td>
					</tr>
				</table>
				<input type='submit', value='Update' class='btn btn-primary'>
				<a class='btn btn-warning' href="index.php">Back</a>
			</div>
		</form>

		<?php
			if(isset($_POST['id']) && isset($_POST['newName']) && isset($_POST['description']) && isset($_POST['style_id']) && isset($_POST['brewery_id']) && isset($_POST['rating'])) {
				$id = $_POST['id'];
				$name = $_POST['newName'];
				$description = $_POST['description'];
				$style = $_POST['style_id'];
				$brewery = $_POST['brewery_id'];
				$rating = $_POST['rating'];
				$beer = new Beer();
				if($beer->update($id, $name, $style, $description, $rating, $brewery)) {
					header ('location: index.php');
				}
			}
		?>
	</div>
			
</body>

</html>