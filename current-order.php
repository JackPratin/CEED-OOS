<?php
    require("php/menuFunctions.php");
    require("php/config.php");
    session_start();
    
    require("php/userType.php");
    typeCheck('customer');


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
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css' rel='stylesheet'>
        
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/content.css">
        <link rel="stylesheet" href="css/current-order.css">
        <title>Current Order</title>
    </head>
    
    <body>
        <div id="menu-div2">
            <div id="main-menu">
                <div id="top-main-menu">
                    <h1 id="choose-category">
                        Order List
                    </h1>
                   
                    <center>
                        <div class="input-icons">
                            <input type="search" class="searchBtn" name="" id="search" placeholder="Search ordered id...">
                            <i class="fa-solid fa-magnifying-glass icon"></i>
                        </div>
                    </center>
                </div> <br>
                
            </div>
            
            <div id="food-items" class="d-food-items">
            
                <div id="biryani" class="d-biryani">
                    <b><p class="food1">Order #110</p></b>
                    <b><p id="fooddate">31 Oct 2022, 08:28PM</p></b>
                
                <div class="first">
                        <img src="css/item images/Classic.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                    <div class="productName">
                        <b><p id="category-name">1975 Classic</p></b>
                        <p id="addons">+ Sliced Cheese</p>  
                        <b><p id="price">P 107.00</p></b> &nbsp  <p id="qtyy">Qty:1</p> 
                    </div>
                </div>
                <hr>

                    <div class="second">
                            <img src="css/item images/Classic.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">

                        <div class="productName2">
                            <b><p id="category-name">1975 Classic</p></b>
                            <p id="addons">+ Sliced Cheese</p>  
                            <b><p id="price">P 107.00</p></b> &nbsp  <p id="qtyy1">Qty:1</p> 
                        </div>
                        <br><br><br><hr>
                    </div>
                     

                    <div class="itemQty">
                        <b><p class="items">X2 Items</p></b>
                        <b><p class="totalItem">P 214.00</p></b>
                    </div>

                    <div class="status">
                        <div class="statusIcon">
                            <div class="grilling">
                                <i class="fa-solid fa-fire"></i>
                            </div>
                        </div>
                        <div class="statusIcon">
                            <div class="motor">
                                <i class="fa-solid fa-motorcycle"></i>
                            </div>
                        </div>
                        <div class="statusIcon">
                            <div class="motor">
                                <i class="fa-solid fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
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