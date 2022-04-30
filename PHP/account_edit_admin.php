<!DOCTYPE HTML>

<html>

<head>
    <title>Edit Account</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />

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
        width: 35%;
        height: 55%;
        background-color: #3e3e3e;
        color: black;
        top: 55%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    #rcorners1 {
        border-radius: 0px 0px 30px 0px;
        background: #3e3e3e;
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
    
    #rcorners2 {
        border-radius: 0px 0px 0px 30px;
        background: #3e3e3e;
        padding: 0px;
        width: 400px;
        height: 80px;
        float: right;
        margin: 0px;
    }
    
    #selected{
    	background: white;
    	border-radius: 10px;
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
                    <img src="logo1.png" alt="logo" style="width:80px; height:80px">
                </div>
            </div>
            <div id="rcorners2">
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="home_admin.php" style="color:white;">Home</a></li>
                        <li><a href="stories_admin.php" style="color:white;">Stories</a></li>
                        <li id="selected"><a href="account_admin.php" style="color:black;">Account</a></li>
                        <li><a href="logout_admin.php" style="color:white;">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
		
		<?php
			include('connection.php');
			$full_name = $_GET['full_name'];

			$show = mysqli_query($connection,"SELECT * FROM accounts WHERE full_name='$full_name'") or die(mysqli_error($connection));
			
			if(mysqli_num_rows($show) == 0){
				echo '<script>window.history.back()</script>';
			}
			else{
				$data = mysqli_fetch_assoc($show);
			}
		?>

        <div id="image">
            <div id="outter-div">
                <div id="aligned">
                    <div class="text-block">
					<form method="post" action="account_edit_process_admin.php">
                        <div class="container"></div>
                        <br>
                        <h2 style="color:white"><u>Edit Account</u></h2>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <input id="full_name" type="text" name="full_name" value="<?php echo $data['full_name']; ?>" size="50" />
                        <p></p>
                        <input id="email" type="text" name="email" value="<?php echo $data['email']; ?>" size="50" readonly/>
                        <p></p>
						<input id="password" type="text" name="password" value="<?php echo $data['password']; ?>" size="50" />
                        <p></p>
                        <input id="status" type="text" name="status" value="<?php echo $data['status']; ?>" size="50" />
                        <p></p>
                        <p></p>
						<br>
						<button id="cancel" name="cancel" value="cancel" class="btn btn-default btn-lg" formaction="account_admin.php">Cancel</button>
                        <button id="save_account" name="update" value="update" class="btn btn-default btn-lg" formaction="account_edit_process_admin.php">Save</button>
					</form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>