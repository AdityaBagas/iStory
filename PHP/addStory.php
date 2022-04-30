<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $connection = mysqli_connect("localhost", "uajyproj_istory", "pbpkelompok5", "uajyproj_istory") or die("Failed to connect!");

    $title      = $_POST['title'];
    $content    = $_POST['content'];
    
    $input = mysqli_query($connection, "INSERT INTO story(title, content) VALUES('$title', '$content')");
    
    if($input)
    {
        $response['value'] = 1;
        $response['message']="Successfull!";
        echo json_encode($response);
    
    }
    else{
        $response['value'] = 0;
        $response['message']="Failed! ";
        echo json_encode($response);
    }
    
    mysqli_close($connection);
}