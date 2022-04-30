<?php
   if(isset($_GET['full_name'])){
		include('connection.php');

		$full_name = $_GET['full_name'];

		$check = mysqli_query($connection,"SELECT full_name FROM accounts WHERE full_name='$full_name'") or die(mysqli_error($connection));

		if(mysqli_num_rows($check) == 0){
			echo '<script>window.history.back()</script>';
		}
		else{
			$delete = mysqli_query($connection,"DELETE FROM accounts WHERE full_name='$full_name'");

			if($delete){
				echo '<script type="text/javascript">'; 
				echo 'alert("Account data was successfully deleted!");'; 
				echo 'window.location.href = "account_admin.php";';
				echo '</script>';
			}
			else{
				echo '<script type="text/javascript">'; 
				echo 'alert("Account data was not successfully deleted!");';
				echo '</script>';
			}
		}
	}
	else{
		echo '<script>window.history.back()</script>';
	}
?>