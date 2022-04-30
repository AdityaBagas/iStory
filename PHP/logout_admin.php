<!DOCTYPE HTML>

<html>

<head>
    <title>Log Out</title>
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
        left:25px;
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
    
    ul#menu li {
        float: left;
        margin: 10px 10px 10px;
        padding: 10px 10px 10px;
        list-style: none;
    }
    
    #outter-div {
        text-align: center;
    }
    
    .text-block {
        border-radius: 15px;
        position: absolute;
        width: 27%;
        height: 47%;
        background-color: #3e3e3e;
        color: black;
        top: 55%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    #confirm {
        padding-left: 50px;
        padding-right: 50px;
    }
    
    #selected{
    	background: white;
    	border-radius: 10px;
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
                        <li><a href="account_admin.php" style="color:white;">Account</a></li>
                        <li id="selected"><a href="logout_admin.php" style="color:black;">Log Out</a></li>
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
                <h2 style="color:white"><u>Log Out</u></h2>
                <br>
                <br>
                <p><font style="color:white" size="2">Are you sure want to log out? If you log out,<br> 
you need to log in again.</font></p>
<br>
<br>
<a href="home_admin.php"><button id="cancel_logout" class="btn btn-default btn-lg">Cancel</button></a>
<a href="index.php"><button id="confirm_logout" class="btn btn-default btn-lg">Log Out</button></a>
			</div>

		</div>

	</div>
</body>
</html>