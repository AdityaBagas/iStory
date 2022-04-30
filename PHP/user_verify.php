<!DOCTYPE HTML>

<html>

<head>
    <title>Verify</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<style>
    img {
        border-radius: 30px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }
    
    div.a {
        text-align: center;
    }
    
    .container {
        position: relative;
        text-align: center;
        color: white;
    }
    
    .text-block {
        border-radius: 15px;
        position: absolute;
        width: 30%;
        height: 36%;
        background-color: #525252;
        color: white;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    #rcorners1 {
        border-radius: 0px 0px 30px 0px;
        background: white;
        padding: 0px;
        width: 130px;
        height: 85px;
        float: left;
        margin: 0px;
    }
    
    #logo {
        margin: center;
        position: relative;
    }
        
    ul#menu li {
        float: left;
        margin: 10px 10px 10px;
        padding: 10px 10px 10px;
        list-style: none;
    }
    
    #rcorners3 {
        border-radius: 30px;
        background: #73AD21;
        height: 500px;
    }
	
    #outter-div {
        text-align: center;
    }
    
    #outter-div:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -0.25em;
    }
    
    #aligned {
        display: inline-block;
        vertical-align: middle;
        width: 300px;
    }
    
    .image {
        position: relative;
        width: 100%;
        /* for IE 6 */
    }
    
    h2 {
        position: absolute;
        width: 100%;
        text-align: center;
    }
</style>

<body background="background.jpg">
    <div id="main">
        <div id="header">
            <div id="rcorners1">
                <div id="logo">
                    <img src="logo.png" alt="logo" style="width:80px; height:80px">
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div id="outter-div">
            <div class="text-block">
                <br>
                <h2 style="color:white"><u>Account Verification</u></h2>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <?php
						try {
							$connect = mysqli_connect("localhost", "uajyproj_istory", "pbpkelompok5", "uajyproj_istory") or die("Failed to connect the database!");

							$hash   = $_GET['hash'];
							$status = "not active";
										
							$search     = mysqli_query($connect, "SELECT hash FROM accounts WHERE hash='$hash'") or die("Failed find hash!");
							
							$search1    = mysqli_query($connect, "SELECT status FROM accounts WHERE hash='$hash'
							AND status='$status'") or die("Failed find status!");
							
							$match  = mysqli_num_rows($search);
							$match1 = mysqli_num_rows($search1);
						
							if($match > 0 && $match1 > 0){
								mysqli_query($connect, "UPDATE accounts SET status='active' WHERE hash='$hash'") or die("Failed to update status!");
								echo '
									<font size="2">Your iStory account has been activated. 
										<br>You can now login!</font>
									<br>
								';
							}else{
								echo '
									<font size="2">The URL is either invalid or you already 
										<br>have activated your iStory account!</font>
									<br>
								';
							}
						}
						catch (Exception $e) {
							throw $e;
						}	
					?>
                </div>
                <br>
				<br>
            </div>
        </div>
    </div>
</body>

</html>