<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<form action="Avalidate.php" method="post">
			<p>Username</p>
			<input type="text" name="user" required>
			<p>Password</p>
			<input type="password" name="pass" required>
			<br><br>
			<input type="submit" value="Login">
			<br><br>
			<?php 
				if (isset($_SESSION['AdminRemark'])) {
					echo $_SESSION['AdminRemark'];
					unset($_SESSION['AdminRemark']);
				}
			?>
		</form>
	</div>
</body>
</html>