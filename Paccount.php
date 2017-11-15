<?php 
	session_start();
	$_SESSION['e_id'] = $_GET['e_id'];
	$_SESSION['e_name'] = $_GET['name'];
	if (isset($_SESSION['userLogin'])) {
		header("Location: ConfirmReg.php");
		exit();
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>login/register</title>
</head>
<body>
	<p>Create a new account</p>
	<p><a href="Pregister.php?e_id=<?php echo $_GET['e_id'] ?>">Register</a></p>
	<p>Already have an account> Login</p>
	<p><a href="Plogin.php">Register</a></p>
</body>
</html>