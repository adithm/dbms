<?php 

	define('host', 'localhost');
	define('user', 'root');
	define('password', 'eatmore');	
	define('db_name', 'cultura');

	$dbc = mysqli_connect(host, user, password, db_name);
	if (mysqli_connect_errno()) {
		echo "fail";
	}