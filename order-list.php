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
        <!-- <link rel="stylesheet" href="css/contents.css"> -->
        <link rel="stylesheet" href="css/order-list.css">
        <title>Order List</title>
    </head>
    
    <body>
        <div id="menu-div">
            <div id="main-menu">
                <div id="top-main-menu">
                    <!-- <h1 id="choose-category">
                        Track Order
                    </h1> -->
                    <center>
                        <!-- <input type="search" name="" id="search" placeholder="Search category or menu..."> -->
                    </center>
                </div> <br>
                
                <h2>Current Orders</h2>
                <?php
                    trackOrderDisplay();
                ?>

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
                
                
            </div>
        </div>
        <footer id='footer-menu'>
            <div>
                <center><img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 50%;"><br>
                Copyright© 2023 <br></center>
            </div>
            <div>
                Contact us:<br>
                +63 927 253 9416<br>
                1975oldfashionedburgers@gmail.com<br>
                #26 Ignacio Cruz St., San Roque, Marikina City.<br>
            </div>
            <div>
                <center>
                    <a href='Terms-and-conditions.html'>
                        Terms and Conditions
                    </a><br><br>
                    For news and updates, follow us:<br> <br> 
                    <div id="socials">
                        <a href="https://www.facebook.com/1975OldFashionedBurgers" target="_top"><img src='css/system images/fb.png'></a>
                        <a href="https://www.instagram.com/1975_oldfashionedburgers/" target="_top"><img src='css/system images/ig.png'></a>
                    </div>
                </center>
            </div>
        </footer>

        <script src="js/navigation.js"></script>
        
    </body>
</html>