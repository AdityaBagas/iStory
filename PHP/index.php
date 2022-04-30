<!DOCTYPE HTML>

<html>

<head>
    <title>Log In</title>
    <meta name="description" content="website description" />
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
        width: 35%;
        height: 62%;
        background-color: #3e3e3e;
        color: black;
        top: 55%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    div.c {
        line-height: 3%;
    }
    
    .selected{
        background: #008FFF;
        border-radius: 10px;
    }
    
    h2 {
        position: absolute;
        width: 100%;
        text-align: center;
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
</style>

<body background="background.jpg">

    <div id="main">
        <div id="header">
            <div id="rcorners1">
                <div id="logo">
                    <img src="logo1.png" alt="logo" style="width:80px; height:80px">
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
			<form method="post" action="login_process.php">
                <br>
                <h2 style="color:white"><u>Log In</u></h2>
                <br>
                <br>
                <br>
                <br>
                <p><font style="color:white" size="2">Welcome back! Login to access Administrator Page<br> 
Did you forget your password?</font></p>
                <br>
                <br>
                <input type="text" name="email" size="48px" required="required" placeholder="Email">
                <br>
                <br>
                <input type="password" name="password" size="48px" required="required" placeholder="Password">
                <br>
                <br>
                <br>
                <br>
                <button type="submit" name="login" value="login" class="btn btn-default btn-lg">Continue</button>
			</form>
            </div>
        </div>
    </div>
</body>

</html>