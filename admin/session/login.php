<?php 
	session_start();
	if(isset($_SESSION['user'])) {
		header('Location: /beers-blog-php/admin');
	}
?>
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
		<?php			
			include ('../../models/user.php');
			include('../menu_top.php');

			if(isset($_POST['email']) && isset($_POST['password'])){
				$email = $_POST['email'];
				$pass = $_POST['password'];
				if(empty($email) || empty($pass)) {
					echo "<br><div class='alert alert-info col-md-8'>All fields are required!</div>";
				} else {
					$user = User::logIn($email, $pass);
					if($user) {
						$_SESSION['user'] = $user->email;
						$_SESSION['first_name'] = $user->first_name;
						$_SESSION['last_name'] = $user->last_name;
						$_SESSION['admin'] = $user->admin;
						header('Location: /beers-blog-php/admin');
					} else {
						echo "<br><div class='alert alert-info col-md-8'>Wrong email/password combination!</div>";
					}
				}
			}

		?>
		<div class='col-md-8'>
			<table class='table table striped'>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>", method='POST'>
					<tr>
						<th>Email:<input type='email' name='email' class='form-control'></th>
					</tr>
					<tr>
						<th>Password:<input type='password' name='password' class='form-control'></th>
					</tr>
					<tr>
						<th><input type='submit' value='Log in' class='btn btn-primary'></th>
					</tr>
				</form>
			</table>
		</div>
	</div>
</body>
</html>