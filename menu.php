<?php
    require("php/menuFunctions.php");
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
        <title>Menu</title>
    </head>
    
    <body>
        <!-- <div class="navigation-div">
            <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="side-logo">
            
            <a onclick="changeDisplay('menu-selected', 'menu-unselected')">
                <div class="nav-item">
                    <div class="unselected" id="menu-unselected">
                        <img class="nav-vector" src="css/system images/nav icons/menu.png" alt="Menu Vector">
                    </div>
                    <div class="selected" id="menu-selected">
                        <img class="nav-vector" src="css/system images/nav icons/menu-selected.png" alt="Menu Vector">
                    </div> <br>
                    Menu
                </div>
            </a>

            <a onclick="changeDisplay('order-list-selected', 'order-list-unselected')">
                <div class="nav-item">
                    <div class="unselected" id="order-list-unselected">
                        <img class="nav-vector" src="css/system images/nav icons/order-list.png" alt="List Vector">
                    </div>
                    <div class="selected" id="order-list-selected">
                        <img class="nav-vector" src="css/system images/nav icons/order-list-selected.png" alt="List Vector">
                    </div> <br>
                    Order List
                </div>
            </a>

            <a onclick="changeDisplay('history-selected', 'history-unselected')">
                <div class="nav-item">
                    <div class="unselected" id="history-unselected">
                        <img class="nav-vector-history" src="css/system images/nav icons/history.png" alt="History Vector"> 
                    </div>
                    <div class="selected" id="history-selected">
                        <img class="nav-vector-history" src="css/system images/nav icons/history-selected.png" alt="History Vector"> 
                    </div> <br>
                    Order History
                </div>
            </a> -->

            <!-- <div class="nav-item"> -->
                <!-- <br>
                <br> -->
            <!-- </div> -->

            <!-- <a>
                <div class="nav-item">
                    <img class="nav-vector"  src="css/system images/nav icons/logout.png"  alt="tabler:logout"> <br>
                    Logout
                </div>
            </a>
        </div> -->
        <div id="menu-div">
            <div id="main-menu">
                <div id="top-main-menu">
                    <p id="choose-category">
                        CHOOSE CATEGORY
                    </p>
                    <center>
                        <input type="search" name="" id="search" placeholder="Search category or menu...">
                    </center>
                </div> <br>
                <div id="categories">
                    <div class="category-item">All</div>
                    <div class="category-item">Burgers</div>
                    <div class="category-item">Chicken</div>
                    <div class="category-item">Sides</div>
                    <div class="category-item">Extras</div>
                </div> <br>
                <div id="menu-name">
                    Burger Menu
                </div> <br>
                <div id="item-list">
                    <?php itemDisplay(); ?>
                </div>

            </div>
            
            <div id="cart-div">
                <div id="customer-card">
                    <div id="customer-img">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                    </div>&nbsp; 
                    <div id="customer-name" class="bold">
                        <span style="color: white;">Hello!</span>
                        <span>JAN PATRICK</span>
                    </div>
                </div>
                
                <br>
                <br>
                <br><br>
                <br>
                <br><br>
                
                <div id="cart-middle">
                    <span class="bold" style="font-size: 20px;">Your Cart</span><br>
                    <div id="cart-items-div">
                        <div id="cart-items">
                            <div id="item-img">
                                <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                            </div>&nbsp; 
                            <div id="item-details" class="bold">
                                <span class="end-to-end">1975 Classic <button>X</button></span>
                                <span class="end-to-end"> 
                                    <span>
                                        <span class="span-x">x </span>
                                        1
                                    </span> 
                                    <span id="item-price" class="span-x">₱95.00</span>
                                </span>
                            </div>
                        </div> <br>
                        <div id="cart-items">
                            <div id="item-img">
                                <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                            </div>&nbsp; 
                            <div id="item-details" class="bold">
                                <span class="end-to-end">Cheesy Bacon Fries <button>X</button></span>
                                <span class="end-to-end"> 
                                    <span>
                                        <span class="span-x">x </span>
                                        1
                                    </span> 
                                    <span id="item-price" class="span-x">₱125.00</span>
                                </span>
                            </div>
                        </div> <br>
                        <div id="cart-items">
                            <div id="item-img">
                                <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                            </div>&nbsp; 
                            <div id="item-details" class="bold">
                                <span class="end-to-end">Double  Classic <button>X</button></span>
                                <span class="end-to-end"> 
                                    <span>
                                        <span class="span-x">x </span>
                                        1
                                    </span> 
                                    <span id="item-price" class="span-x">₱135.00</span>
                                </span>
                            </div>
                        </div> 
                    </div>

                    <div id="fees-div">
                        <span class="end-to-end"><span class="bold">Subtotal</span><span>₱355.00</span></span><br>
                        <span class="end-to-end"><span>Delivery Fee</span><span>₱70.00</span></span><br>
                        <hr id="cart-hr">
                        <span class="end-to-end bold"><span>Total</span><span>₱425.00</span></span>
                    </div> 
                </div>

                <br>

                <div id="cart-bottom">
                    Select Pick-up/Deliver: <br><br>
                    <div id="buttons">
                        <div id="upper-button">
                            <button class="upper button">Pick-up</button>&nbsp;
                            <button class="upper button"><img src="css/system images/menu icons/delivery.png" alt="Picture of motorcycle" height="60%" width="60%"></button> 
                        </div>
                        <div id="lower-button">
                            <button class="button" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script src="js/navigation.js"></script>
        
        
    </body>
</html>