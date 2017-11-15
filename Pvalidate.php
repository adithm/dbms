<?php
	session_start();

	require('connect.php');

	$name = $_POST["name"];
	$phno = $_POST["phno"];
	$email = $_POST["email"];
	$college = $_POST["college"];
	$year = $_POST["year"];
	$username = $_POST["username"];
	$password = $_POST["pass"];

	$query = "SELECT * FROM participant WHERE email = '".$email."'";
	$row = @mysqli_fetch_array(mysqli_query($dbc, $query));
	if (isset($row)) { 
		$_SESSION['UserRemark'] = "email id already exists";
		header("Location: Pregister.php");
		exit();
	}

	// echo $email."<br>";
	// $query = "SELECT * FROM participant WHERE email = '".$email."'";
	// $res = mysqli_query($dbc, $query);
	// $row = @mysqli_fetch_array($res);
	// var_dump($row);

	$query = "SELECT * FROM participant WHERE username = '".$username."'";
	$row = @mysqli_fetch_array(mysqli_query($dbc, $query));
	if (isset($row)) {
		$_SESSION['UserRemark'] = "username already exists";
		header("Location: Pregister.php");
		exit();
	}

	$query = "INSERT INTO participant VALUES('NULL', '$name', '$phno', '$email', '$college', '$year', '$username', '$password')";
	if (mysqli_query($dbc, $query)) {
		$_SESSION['userLogin'] = "true";
		$_SESSION['username'] = $username;
		header("Location: ConfirmReg.php");
		exit();		
	} else {
		echo 'ERROR'.mysqli_error($dbc);
	}	
?>