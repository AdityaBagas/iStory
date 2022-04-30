<?php   

	$connection = mysqli_connect("localhost", "uajyproj_istory", "pbpkelompok5", "uajyproj_istory") or die("Failed to connect!");

    $email      = $_POST['email'];
    $password   = md5($_POST['password']);
    $response   = array("error"=>FALSE);

    $select     = mysqli_query($connection, "SELECT * FROM accounts WHERE email='$email' AND password='$password'");
    $data       = mysqli_fetch_assoc($select);
    $num_rows   = mysqli_num_rows($select);
    
    $status_user    = "active";
    $search1        = mysqli_query($connection, "SELECT email FROM accounts WHERE email='$email'
    AND status='$status_user'") or die("Failed find status!");
    $match          = mysqli_num_rows($search1);

    if($num_rows==1 && $match > 0)
    {
        $user_full_name = $data['full_name'];
        $user_email     = $data['email'];
        $status         = TRUE;
        echo json_encode(array("response"=>$status,"user_full_name"=>$user_full_name, "user_email"=>$user_email));
    }
    else
    {
        $status = FALSE;
        echo json_encode(array("response"=>$status));
    }
?>