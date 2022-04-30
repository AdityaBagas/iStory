<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $connection = mysqli_connect("localhost", "uajyproj_istory", "pbpkelompok5", "uajyproj_istory") or die(mysqli_error($connection));
    
        $full_name  = $_POST['full_name'];
        $email      = $_POST['email'];
        $password   = md5($_POST['password']);
    
        $input      = mysqli_query($connection, "UPDATE accounts SET full_name='$full_name', password='$password' WHERE email='$email'");
    
        if($input) {
            $response['value']=1;
            $response['message']="Edit Account Success!";
            echo json_encode($response);
        }
        else {
            $response['value']=0;
            $response['message']="Failed when editing your account!";
            echo json_encode($response);
        }
        mysqli_close($connection);
     }
?>