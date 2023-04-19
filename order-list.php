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
                
                <br>
                <br>
                <br><br>
                <br>
                <br><br>
                
            </div>
        </div>

       
        <div class='popup' id='popup1'>
            <div > 
                <div style="display:flex; justify-content: space-between;">
                    <span>Recommended Extras</span>
                    <span><button href="#" onclick="hide('popup1')">X</button></span>
                </div><br>
            Select additional ingredients(optional)<br>
            
                <div style="display:flex; flex-direction:column;";> 
                    <?php

                        $extras_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category = 4");
                        
                        while($extras = mysqli_fetch_array($extras_qry,MYSQLI_ASSOC)){
                            echo"<div style=\"display:flex; justify-content: space-between;\";><span><input type='checkbox' class='checkbox'> $extras[product_name]</span> <span>₱$extras[product_price]</span></div>";
                            // echo"<input type='checkbox'> &nbsp; Bacon";
                        }
                    ?>
                </div>
            </div>
            <br>
            
            <div class="number-input">
                <span>
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>

                    <input class="quantity" id="currentQty" min="1" name="quantity" value="1" type="number">

                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button> 
                </span>

                <span min-width="90%">     
                    <input type="submit" value="Add to Cart" class="addCart" onclick='addToCart()'>
                    <!-- hide("popup1") -->
                </span>
                <input type="hidden" name="" id="id" value="">
            </div>

            <!-- <a href='#' >Ok!</a> -->
        </div>

        <div class='popup' id='popup2'>
            <div style="display:flex; justify-content: space-between;">
                <span>Flavors</span>
                <span><button href="#" onclick="hide('popup2')">X</button></span>
            </div><br>

            <div > <br>
            
                <div style="display:flex; flex-direction:column;";> 
                    <?php

                        // $extras_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category = 4");
                        
                        // while($extras = mysqli_fetch_array($extras_qry,MYSQLI_ASSOC)){
                        //     echo"<div style=\"display:flex; justify-content: space-between;\";><span><input type='checkbox' class='checkbox'> $extras[product_name]</span> <span>₱$extras[product_price]</span></div>";
                        //     // echo"<input type='checkbox'> &nbsp; Bacon";
                        // }
                        echo "<div><input type='checkbox' class='checkbox'> Barbecue</div>
                        <div><input type='checkbox' class='checkbox'> Buffalo</div>
                        <div><input type='checkbox' class='checkbox'> Garlic Parmesan</div>
                        <div><input type='checkbox' class='checkbox'> Honey Garlic</div>
                        <div><input type='checkbox' class='checkbox'> Salted Egg</div>
                        ";
                    ?>
                </div>
            </div>
            <br>
            
            <div class="number-input">
                <span>
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>

                    <input class="quantity" id="currentQty" min="6" name="quantity" value="6" step="6" type="number">

                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button> 
                </span>

                <span min-width="90%">     
                    <input type="submit" value="Add to Cart" class="addCart" onclick='addToCart()'>
                    <!-- hide("popup1") -->
                </span>
                <input type="hidden" name="" id="id" value="">
            </div>
        </div>
        <div class='popup' id='popup3'>
            <p>This is a popup!</p>
            <p>Overlay uses <b>:before</b> and <b>:after</b> pseudo-classes.</p>
                <p>(This one does block elements on the background)</p>
            <a href='#' onclick='hide("popup3")'>Ok!</a>
        </div>
        <div class='popup' id='popup5'>
            <p>This is a popup!</p>
            <p>Overlay uses <b>:before</b> and <b>:after</b> pseudo-classes.</p>
                <p>(This one does block elements on the background)</p>
            <a href='#' onclick='hide("popup5")'>Ok!</a>
        </div>
        

        <script src="js/navigation.js"></script>

        <script>
           function sub(cart){
                document.getElementById('form'+cart).submit();
           }
        </script>
        
        
    </body>
</html>