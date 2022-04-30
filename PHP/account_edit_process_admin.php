<?php
	if(isset($_POST['update'])){
	include('connection.php');
	
	$full_name	= $_POST['full_name'];	
	$email		= $_POST['email'];
	$password	= $_POST['password'];	
	$status		= $_POST['status'];
	
	$update = mysqli_query($connection, "UPDATE accounts SET full_name='$full_name', password='$password', status='$status' WHERE email='$email'") or die(mysqli_error($connection));
	
		if($update){
			echo '<script type="text/javascript">'; 
			echo 'alert("Profile data was successfully updated!");'; 
			echo 'window.location.href = "account_admin.php";';
			echo '</script>';

		}
		else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Profile data was not successfully updated!");';
			echo '</script>';
		}
 
	}
	else{	
		echo '<script>window.history.back()</script>';
	}
?>