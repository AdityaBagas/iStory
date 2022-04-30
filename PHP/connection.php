<?php
	$server		= 'localhost';
	$username 	= 'uajyproj_istory';
	$password 	= 'pbpkelompok5';
	$database 	= 'uajyproj_istory';

	$connection = mysqli_connect($server, $username, $password, $database);
	
	if($connection){
// 		echo 'success';
	}
	else{
		echo 'failed';
	}
?>