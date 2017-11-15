<?php 
	session_start();
	require('connect.php');

	if (!isset($_SESSION['e_id'])) {
		header("Location: events.php");
		exit();
	}

	if (isset($_GET['yes'])) {
		$query = "SELECT p_id FROM participant WHERE username = '".$_SESSION['username']."'";
		$row = @mysqli_fetch_array(mysqli_query($dbc, $query));
		$e_id = $_SESSION['e_id'];
		$p_id = $row["p_id"];
		$_SESSION['p_id'] = $p_id;		
		$query = "INSERT INTO participate VALUES('$p_id', '$e_id', 'NULL')";
		if (mysqli_query($dbc, $query)) {
			header("Location: userEvent.php");
		} else {
			echo 'ERROR '.mysqli_error($dbc);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Are you sure you want to register for <?php echo $_SESSION['e_name'] ?>?</p>
	<a href="ConfirmReg.php?yes=1">Yes</a>
	<a href="events.php">No</a>
</body>
</html>