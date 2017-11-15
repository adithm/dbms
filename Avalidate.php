<?php 	
	session_start();

	require('connect.php');

	$username = $_POST["user"];
	$password = $_POST["pass"];
	var_dump($username);

	$query = "SELECT * FROM login WHERE username = '".$username."' AND password = '".$password."'";
	$res = mysqli_query($dbc, $query);
	$row = @mysqli_fetch_array($res);

	if (!isset($row)) {
		$_SESSION['AdminRemark'] = "Username and/or Password is invalid";
		header("Location: Alogin.php");
		exit();
	}
	$_SESSION['AdminLogin'] = "true";
	header("Location: admin.php");
	
?>