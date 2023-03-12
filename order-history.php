<?php
    require("php/menuFunctions.php");
    require("php/config.php");
    session_start();

    if(!isset($_SESSION['current_page'])){
        $_SESSION['current_page'] = "menu.php"; 
    }
    else{
        $_SESSION['current_page'] = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/contents.css">
        <title>Order History</title>
    </head>
    
    <body>
        <div id="menu-div">
            <div id="main-menu">
                <div id="top-main-menu">
                    <p id="choose-category">
                        ORDER HISTORY
                    </p>
                    <center>
                        <input type="search" name="" id="search" placeholder="Search category or menu...">
                    </center>
                </div> <br>
            </div>
            
            <div id="order-list cart-div">
                <div id="customer-card">
                    <div id="customer-img">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                    </div>&nbsp; 

                    <div id="customer-name" class="bold">
                        
                        <span style="color: white;">Hello!</span>
                        <span><?php echo $_SESSION['first_name']; ?></span>
                    </div>
                </div>
                
                <br>
                <br>
                <br><br>
                <br>
                <br><br>
                
            </div>
        </div>
        

        <script src="js/navigation.js"></script>
        
        
    </body>
</html>