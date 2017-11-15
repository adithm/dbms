<?php
	session_start();	
	require('connect.php');
	if (isset($_GET['e_id'])) {
		$query = "INSERT INTO coordinate VALUES({$_GET['co_id']}, {$_GET['e_id']})";
		if (mysqli_query($dbc, $query)) {
			$_SESSION['cMsg'] = "Updated. Do you wish to coordinate any other events?";
			header("Location: coordinator.php?co_id={$_GET['co_id']}");
			exit();		
		} else {
			echo 'ERROR'.mysqli_error($dbc);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Coordinator</title>
</head>
<body>
	<?php
		if (isset($_SESSION['cMsg'])) {
			echo $_SESSION['cMsg']."<br><br>";
			unset($_SESSION['cMsg']);
		}
		$query = "SELECT * FROM event WHERE e_id NOT IN (SELECT e_id FROM coordinate WHERE co_id = {$_GET['co_id']})";
		$res = mysqli_query($dbc, $query);
		while ($row = @mysqli_fetch_assoc($res)) {
			echo "<h4>".$row['e_name']."</h4>";
			echo "<p>".$row['description']."</p>";
			echo "<p>Date and time: ".$row['time']."</p>";
			echo "<p>Duration : ".$row['duration']."</p>";
			echo "<a href='Coordinator.php?e_id=".$row['e_id']."&co_id=".$_GET['co_id']."'>Coordinate Event</a>";
		}
	?>
</body>
</html>