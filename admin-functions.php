<?php
    require("php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contents.css">
    <link rel="stylesheet" href="css/admin functions.css">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <title>Admin Functions</title>
    
</head>
<body>

<ul>
  <li><a href="#home">Stock Monitoring</a></li>
  <li><a href="#news">Sales Report</a></li>
  <li><a href="#contact">Add an account</a></li>
  <li><a href="#about">About</a></li>
</ul>

<div class="admin-iframe-div">
    <iframe src="admin-add-user.php" frameborder="0" class="admin-iframe"></iframe>
</div>
    
</body>
</html>