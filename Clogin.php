<?php
	session_start();
	require('connect.php');
	if (isset($_POST["user"])) {
		$username = $_POST["user"];
		$password = $_POST["pass"];
		var_dump($username);

		$query = "SELECT * FROM coordinator WHERE username = '".$username."' AND pass = '".$password."'";
		$row = @mysqli_fetch_array(mysqli_query($dbc, $query));

		if (!isset($row)) {
			$_SESSION['cRemark'] = "Username and/or Password is invalid";
			header("Location: Clogin.php");
			exit();
		}
		$_SESSION['cLogin'] = "true";
		header("Location: coordinator.php?co_id={$row['co_id']}");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<form action="Clogin.php" method="post">
			<p>Username</p>
			<input type="text" name="user" required>
			<p>Password</p>
			<input type="password" name="pass" required>
			<br><br>
			<input type="submit" value="Login">
			<br><br>
			<?php 
				if (isset($_SESSION['cRemark'])) {
					echo $_SESSION['cRemark'];
					unset($_SESSION['cRemark']);
				}
			?>
		</form>
	</div>
</body>
</html>