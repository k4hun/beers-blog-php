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
		<h2>Update brewery</h2>
		<?php 
			require_once '../../models/style.php';
			if(isset($_POST['newName']) && isset($_POST['description']) && isset($_POST['id'])) {
				$id = $_POST['id'];
				$newName = $_POST['newName'];
				$description = $_POST['description'];

				if(empty($newName) || empty($description) || empty($id)) {
					echo "<br><div class='alert alert-info col-md-8'>All fields are required!</div>";
				} else {
					$style = new Style();
					echo "asdasd";
					if($up = $style->update($id, $newName, $description)) {
						header ('Location: index.php');
						die();
					}
				}
			}
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
					</tr>
				</table>
				<input type='submit' value='Update' class='btn btn-primary'>
				<a class='btn btn-warning' href="index.php">Back</a>
			</div>
		</form>
	</div>
			
</body>

</html>