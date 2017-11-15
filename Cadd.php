<?php
	session_start();
	require('connect.php');
	if (isset($_POST["user"])) {
		$name = $_POST["name"];
		$phno = $_POST["phno"];
		$year = $_POST["year"];
		$username = $_POST["user"];
		$password = $_POST["pass"];
		$query = "INSERT INTO coordinator VALUES('NULL', '$name', '$phno', '$year', '$username', '$password')";
		if (mysqli_query($dbc, $query)) {
			$_SESSION['adminMsg'] = "Coordinator created.";
			header("Location: admin.php");
		} else {
			echo 'ERROR'.mysqli_error($dbc);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<form action="Cadd.php" method="post">
			<p>Enter values for new Coordinator</p>
			<p>Name</p>
			<input type="text" name="name" required>
			<p>Phone Number</p>
			<input type="text" name="phno" required>
			<p>Year</p>
			<input type="text" name="year" required>
			<p>Username</p>
			<input type="text" name="user" required>
			<p>Password</p>
			<input type="password" name="pass" required>
			<br><br>
			<input type="submit" value="Login">
			<br><br>
		</form>
	</div>
</body>
</html>