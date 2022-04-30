<?php
    ob_start();
    include("database_config.php");

	$email		= "";
	$password	= "";
	
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	
	echo $email ." : ".$password;

	$q = 'SELECT * FROM user_admin WHERE email=:email AND password=:password';

	$query = $dbh->prepare($q);

	$query->execute(array(':email' => $email, ':password' => $password));


	if($query->rowCount() == 0){
	    header('Location: index.php');
	}
	else{
		header('Location: home_admin.php');
	}
	ob_end_clean();
?>