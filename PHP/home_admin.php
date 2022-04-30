<!DOCTYPE HTML>

<html>

<head>
    <title>Home</title>
    <meta name="description" content="website description" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Javascripts/alert_login.js"></script>

</head>

<style>
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
    
    img {
        border-radius: 30px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    
    div.a {
        text-align: center;
    }
    
    .container {
        position: relative;
        text-align: center;
        color: white;
    }
    
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    .text-block {
        border-radius: 15px;
        position: absolute;
        width: 36%;
        height: 66%;
        background-color: #3e3e3e;
        color: black;
        top: 60%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    div.c {
        line-height: 3%;
    }
	
	tr,
    td {
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
    }
    
    input[type=submit] {
        float: right;
        padding-left: 50px;
        padding-right: 50px;
    }
    
    input[type=file] {
        border: 1px solid #999;
        padding: 50px;
    }
    
    table_home{
        width: 100%;
    }
    
    thead, tbody { 
        display: block; 
        width: 100%;
    }
    
    tbody td, thead th {
        width: 240px;
        max-width: 240px;
    }
    
    .table_history {
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    
    th,
    td {
        text-align: center;
        padding: 15px;
    }
        
    ul#menu li {
        float: left;
        margin: 10px 10px 10px;
        padding: 10px 10px 10px;
        list-style: none;
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
                        <li id="selected"><a href="home_admin.php" style="color:black;">Home</a></li>
                        <li><a href="stories_admin.php" style="color:white;">Stories</a></li>
                        <li><a href="account_admin.php" style="color:white;">Account</a></li>
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
        <br>
        <br>

        <div id="outter-div">
            <div class="text-block">
			<br>
			<h2 style="color:white"><u>Home</u></h2>
			<br>
			<br>
			<br>
			<br>
			<p align="center"><font style="color:white" size="2">Welcome back! What do you want to do?</font></p>
			<br>
			<table class="table_home">
				<tr>
					<th><img src="story1.png" alt="logo" style="width:110px; height:110px"></th>
					<th><img src="account.png" alt="logo" style="width:110px; height:110px"></th>
				</tr>
				<tr>
					<td>
						<a href="stories_admin.php">
							<button type="submit" name="login" value="login" class="btn btn-default btn-lg">Stories</button>
						</a>
					</td>
					<td>
						<a href="account_admin.php">
							<button type="submit" name="login" value="login" class="btn btn-default btn-lg">Accounts</button>
						</a>
					</td>
				</tr>
			</table>
			<br>
			<br>
            </div>
        </div>
    </div>
</body>

</html>