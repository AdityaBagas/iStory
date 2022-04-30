<!DOCTYPE HTML>

<html>

<head>
    <title>Stories Detail</title>
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
        left: 23px;
    }
    
    #logo {
        margin: center;
        position: relative;
        left: 25px;
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
    
    .text-block {
        border-radius: 15px;
        position: absolute;
        height: 60%;
        width: 53%;
        bottom: 15px;
        right: 446px;
        padding: 0px;
        float: right;
        margin: 10px;
        background-color: #3e3e3e;
        color: black;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }
    
    h2 {
        top: 120px;
        width: 100%;
        text-align: center;
    }
    
    h4 {
        text-align: center;
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
    
    table{
        width: 100%;
    }
    
    thead{
        background-color: #f2f2f2
    }
    
    thead, tbody { 
        display: block; 
        width: 90%;
    }
    
    tbody td, thead th {
        width: 400px;
        max-width: 400px;
    }

    tbody {
        height: 180px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .table1 {
        padding-left: 20px;
        padding-right: 20px;
		margin-left: 40px;
		margin-right: 40px;
    }
    
    th,
    td {
        text-align: left;
        padding: 15px;
    }
    
    button{
        margin-left: 30px;
        margin-bottom: 20px;
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

            <div id="rcorners2">
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="home_admin.php" style="color:white;">Home</a></li>
                        <li id="selected"><a href="stories_admin.php" style="color:black;">Stories</a></li>
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
        
        <?php
			include('connection.php');
			$id = $_GET['id'];

			$show = mysqli_query($connection,"SELECT * FROM story WHERE id='$id'") or die(mysqli_error($connection));
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
					<br>
					<h2 style="color:white"><u>Story Detail</u></h2>
					<h4>E-mail: <?php echo $data['email']; ?></h4>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
						<table class="table1">
							<tr>
								<td>
									<label>Title</label>
								</td>
								<td>
									<input id="title" type="text" name="title" value="<?php echo $data['title']; ?>" size="50" />
								</td>
							</tr>
							<tr>
								<td>
									<label>Content</label>
								</td>
								<td>
									<input id="content" type="text" name="content" value="<?php echo $data['content']; ?>" size="50"/>
								</td>
							</tr>
							<br>
						</table>
						<a href="stories_admin.php">
						    <button id="back" class="btn btn-default btn-lg">Back</button>
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>