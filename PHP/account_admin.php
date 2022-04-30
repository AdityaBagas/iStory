<!DOCTYPE HTML>

<html>

<head>
    <title>Account</title>
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
        width: 51%;
        height: 70%;
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
	
	table{
        width: 100%;
    }
    
    thead{
        background-color: #f2f2f2
    }
    
    thead, tbody { 
        display: block; 
        width: 96%;
    }

    tbody {
        height: 270px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .table1 {
		margin-bottom: 20px;
		margin-left: 20px;
		margin-right: 20px;
    }
    
    th,
    td {
        text-align: left;
        padding: 15px;
        background: white;
    }
    
    tbody td{
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
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

        <div id="image">
            <div id="outter-div">
                <div id="aligned">
                    <div class="text-block">
                        <div class="container"></div>
                        <br>
						<h2 style="color:white"><u>Account</u></h2>
						<br>
						<br>
						<br>
						<br>
                        
						<div class="table_history">
						<table class="table1">
						    <thead>
    							<tr>
    								<th style="width:70px; max-width: 70px;">Num.</th>
    								<th style="width:195px; max-width: 195px;">Full Name</th>
    								<th style="width:205px; max-width: 205px;">E-mail</th>
    								<th style="width:188px; max-width: 188px;">Options</th>
    
    							</tr>
    						<thead>
    						<tbody>
                                <?php
                                include ('connection.php');
    
                                $query = mysqli_query($connection,"SELECT * FROM accounts ORDER BY full_name ASC") or die (mysqli_error($connection));
    
                                if (mysqli_num_rows($query) == 0) {
                                    echo '<tr><td colspan="7">No data available!</td></tr>';
                                } 
    							else {
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo '<tr>';
    									echo '<td style="width:70px; max-width: 70px;">'.$no.'</td>'; 
    									echo '<td style="width:195px; max-width: 195px;">'. $data['full_name'] .'</td>';
    									echo '<td style="width:205px; max-width: 205px;">'. $data['email'] .'</td>';
    									echo '<td style="width:188px; max-width: 188px;"><a href="account_edit_admin.php?full_name='.$data['full_name'].'">Edit Data</a> / <a href="account_delete_admin.php?full_name='.$data['full_name'].'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
                                        echo '</tr>';
                                        $no++;
                                    }
                                }
                                ?>
							</tbody>
						</table>
					</div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>