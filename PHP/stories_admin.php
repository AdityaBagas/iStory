<!DOCTYPE HTML>

<html>

<head>
    <title>Stories</title>
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
        width: 70%;
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
    
    h2 {
        top: 120px;
        width: 100%;
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
    
    #history {
        box-sizing: content-box;
        width: 650px;
        height: 25px;
        padding: 30px;
        border: 3px solid black;
    }
    
    table{
        width: 100%;
    }
    
    thead, tbody { 
        display: block; 
        width: 100%;
        background: white;
    }
    
    tbody td, thead th {
        width: 240px;
        max-width: 240px;
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
    }

    tbody {
        height: 250px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .table_history {
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    
    th,
    td {
        text-align: left;
        padding: 15px;
        background: white;
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
        <div id="image">
            <div class="text-block">
                <div class="container"></div>
				<br>
                <h2 style="color:white"><u>Stories</u></h2>
                <br>

                <div class="table_history">
                    <table>
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Options</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include ('connection.php');
    
                                $query = mysqli_query($connection,"SELECT * FROM story ORDER BY id") or die (mysqli_error($connection));
    
                                if (mysqli_num_rows($query) == 0) {
                                    echo '<tr><td colspan="3">No data available!</td></tr>';
                                } 
    							else {
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo '<tr>';
                                        echo '<td>'. $no. '</td>';
    									echo '<td>'. $data['title']. '</td>';
    									echo '<td>'. $data['content'] .'</td>';
    									echo '<td><a href="stories_detail_admin.php?id='.$data['id'].'">Detail</a> / <a href="stories_delete_admin.php?id='.$data['id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
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
</body>

</html>