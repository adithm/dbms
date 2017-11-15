<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="reg_validate.php" method="post">
		<p>Name</p>
		<input type="text" name="user" required>
		<p>Phone no</p>
		<input type="text" name="phno" required>
		<p>Email</p>
		<input type="text" name="email" required>
		<p>College</p>
		<input type="text" name="college" required>
		<p>Year</p>
		<input type="text" name="year" required>
		<br><br>
		<input type="submit" value="Login">
		<br><br>
	</form>
</body>
</html>