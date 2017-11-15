<?php 
	session_start();
	if (!isset($_SESSION['AdminLogin'])) {
		$_SESSION['remark'] = "Please login";
		header("Location: login.php");
		exit();
	}	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
</head>
<body>
	<?php
		if (isset($_SESSION['adminMsg'])) {
			echo $_SESSION['adminMsg']."<br><br>";
			unset($_SESSION['adminMsg']);
		}
	?>
	<a href="Cadd.php">Add coordinator</a>
	<br><br>
	<a href="Aevent.php">View events details</a>
</body>
</html>