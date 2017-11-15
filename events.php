<?php 
	session_start();	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<?php 
		require('connect.php');

		$query = "SELECT * FROM event";
		$res = mysqli_query($dbc, $query);
		while ($row = @mysqli_fetch_assoc($res)) {
			echo "<h4>".$row['e_name']."</h4>";
			echo "<p>".$row['description']."</p>";
			echo "<p>Date and time: ".$row['time']."</p>";
			echo "<p>Duration : ".$row['duration']."</p>";
			echo "<a href='Paccount.php?e_id=".$row['e_id']."&name=".$row['e_name']."'>Register</a>";
		}
	?>
</body>
</html>