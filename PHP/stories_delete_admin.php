<?php
   if(isset($_GET['id'])){
		include('connection.php');

		$id = $_GET['id'];

		$check = mysqli_query($connection,"SELECT id FROM story WHERE id='$id'") or die(mysqli_error($connection));

		if(mysqli_num_rows($check) == 0){
			echo '<script>window.history.back()</script>';
		}
		else{
			$delete = mysqli_query($connection,"DELETE FROM story WHERE id='$id'");

			if($delete){
				echo '<script type="text/javascript">'; 
				echo 'alert("Report data was successfully deleted!");'; 
				echo 'window.location.href = "stories_admin.php";';
				echo '</script>';
			}
			else{
				echo '<script type="text/javascript">'; 
				echo 'alert("Report data was not successfully deleted!");';
				echo '</script>';
			}
		}
	}
	else{
		echo '<script>window.history.back()</script>';
	}
?>