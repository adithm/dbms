<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Pvalidate.php" method="post">
		<p>Name</p>
		<input type="text" name="name" required>
		<p>Phone no</p>
		<input type="text" name="phno" required>
		<p>Email</p>
		<input type="text" name="email" required>
		<p>College</p>
		<input type="text" name="college" required>
		<p>Year</p>
		<input type="text" name="year" required>
		<br><br>
		<p>Username</p>
		<input type="text" name="username" required>
		<p>Password</p>
		<input type="password" name="pass" required>
		<br><br>
		<input type="submit" value="Login">
		<br><br>
		<?php 
			if (isset($_SESSION['UserRemark'])) {
				echo $_SESSION['UserRemark'];
				unset($_SESSION['UserRemark']);
			}
		?>
	</form>
</body>
</html>