<?php
	session_start();
	require('connect.php');
	if (isset($_POST["user"])) {
		$username = $_POST["user"];
		$password = $_POST["pass"];
		var_dump($username);

		$query = "SELECT * FROM participant WHERE username = '".$username."' AND password = '".$password."'";
		$row = @mysqli_fetch_array(mysqli_query($dbc, $query));

		if (!isset($row)) {
			$_SESSION['userRemark'] = "Username and/or Password is invalid";
			header("Location: Plogin.php");
			exit();
		}
		$_SESSION['userLogin'] = "true";
		$_SESSION['username'] = $username;
		header("Location: ConfirmReg.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<form action="Plogin.php" method="post">
			<p>Username</p>
			<input type="text" name="user" required>
			<p>Password</p>
			<input type="password" name="pass" required>
			<br><br>
			<input type="submit" value="Login">
			<br><br>
			<?php 
				if (isset($_SESSION['userRemark'])) {
					echo $_SESSION['userRemark'];
					unset($_SESSION['userRemark']);
				}
			?>
		</form>
	</div>
</body>
</html>