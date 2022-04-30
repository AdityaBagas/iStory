<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {        
        $connection = mysqli_connect("localhost", "uajyproj_istory", "pbpkelompok5", "uajyproj_istory") or die("Failed to connect!");

        $temp       = $_POST['password'];

        $full_name  = $_POST['full_name'];
        $email      = $_POST['email'];
        $password   = md5($_POST['password']);
        $hash       = md5(rand(0,1000));
        
        $input = mysqli_query($connection, "INSERT INTO accounts(full_name, email, password, hash) VALUES('$full_name', '$email', '$password', '$hash')");
            
        if($input)
        {
            $response['value'] = 1;
            $response['message']="Successfully Signed Up!";
            echo json_encode($response);
            
        }
        else{
            $response['value'] = 0;
            $response['message']="Failed to Sign Up! Try again later!";
            echo json_encode($response);
        }
        
        $to      = $email; 
        $subject = 'Signup | Verification'; 
        $message = '
        
        Thank you for Signing Up iStory!
        Below is your account detail and link for you account activation: 
        
        ------------------------
        E-mail  : '.$email.'
        Password: '.$temp.'
        ------------------------
        
        Please click link down below to activate your account!
        http://istory.uajyproject.site/user_verify.php?hash='.$hash.'
        
        '; 
                            
        $headers = 'From: noreply@istory.uajyproject.site' . "\r\n"; 
        mail($to, $subject, $message, $headers); 
        mysqli_close($connection);
    }
?>