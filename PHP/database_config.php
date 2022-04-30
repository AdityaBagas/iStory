<?php
	$host		= 'localhost';
	$username 	= 'uajyproj_istory';
	$password 	= 'pbpkelompok5';
	$database 	= 'uajyproj_istory';

	$dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $username, $password);

	if(!$dbh){

	  echo "Unable to connect to database!";
	}
	else{
		echo "Successfully connect to database!";
	}
?>