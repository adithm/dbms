<?php 
	session_start();
	require('connect.php');

	if (isset($_POST['delete'])) {
		$query = "DELETE FROM participate WHERE p_id = {$_SESSION['p_id']} AND e_id = {$_POST['delete_id']}";
		if (!mysqli_query($dbc, $query)) {
			echo 'ERROR '.mysqli_error($dbc);
		}
	}

	$query = "SELECT * FROM event e WHERE e.e_id IN (SELECT p.e_id FROM participate p WHERE p_id = {$_SESSION['p_id']})";
	$res = mysqli_query($dbc, $query);
	echo "You have currently registered for ";
	while ($row = @mysqli_fetch_assoc($res)) {
		$f = 1;
		echo "<br>";
		echo "<h4>".$row['e_name']."</h4>";
		echo "<p>".$row['description']."</p>";
		echo "<p>Date and time: ".$row['time']."</p>";
		echo "<p>Duration : ".$row['duration']."</p>";
		echo "<form method='post' action='userEvent.php'>
				<input type='hidden' name='delete_id' value='".$row['e_id']."'>
				<input type='submit' name='delete' value='Delete' onClick=\"javascript: return confirm('Please confirm deletion')\">
			  </form>";
	}
	if (!isset($f)) {
		echo "no events";
	}
	echo "<br><a href='events.php?'>Register</a>";
?>