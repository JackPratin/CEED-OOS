<?php
    require("php/config.php");
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
    else{
        $_SESSION['current_admin_page'] = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    }
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
        <title>Sales Report</title>
    </head>
    <body>
        <table></table>
    </body>
</html>