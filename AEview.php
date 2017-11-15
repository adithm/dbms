<?php
	session_start();	

	require('connect.php');	

	$query = "SELECT name, phno, email, college, year FROM participant 
			  WHERE p_id IN (SELECT p_id FROM participate WHERE e_id = {$_GET['e_id']})";

	$response = @mysqli_query($dbc, $query);
	if ($response) {
		echo '<table align="left"
		cellspacing="5" cellpadding="8">
		<tr><td align="left"><b>Name</b></td>
		<td align="left"><b>Phone</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>College</b></td>
		<td align="left"><b>Year</b></td></tr>';

		while ($row = mysqli_fetch_array($response)) {
			echo '<tr><td align="left">' . 
			$row['name'] . '</td><td align="left">' . 
			$row['phno'] . '</td><td align="left">' .
			$row['email'] . '</td><td align="left">' . 
			$row['college'] . '</td><td align="left">' .
			$row['year'] . '</td><td align="left">';
			echo '</tr>';
		}
		echo '</table>';

	} else {
		echo mysqli_error($dbc);
	}
?>