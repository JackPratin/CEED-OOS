<?php
    require("php/menuFunctions.php");
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_page'])){
        $_SESSION['current_page'] = "menu.php"; 
    }
    else{
        $_SESSION['current_page'] = "menu.php";
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
        <title>Menu</title>
    </head>
    
    <body>
        <div id="menu-div">

            <div id="main-menu">
                <img src="css/ad banner/sample ads.png"> <br>

                <div id="top-main-menu">

                    <p id="choose-category">
                        CHOOSE CATEGORY
                    </p>
                    <center>
                        <input type="search" name="" id="search" placeholder="Search category or menu...">
                    </center>
                </div> <br>

                <div id="categories">
                    <button class="category-item-active" id="category0" onclick="filtering('none'); filterChanger('category0')"><img src="css/system images/category icons/all-icon.png"><center>All</center></button>
                    <button class="category-item-inactive" id="category1" onclick="filtering(1); filterChanger('category1')"><img src="css/system images/category icons/burger-icon.png"><center>Burgers</center></button>
                    <button class="category-item-inactive" id="category2" onclick="filtering(2); filterChanger('category2')"><img src="css/system images/category icons/chick'n-icon.png">Chicken</button>
                    <button class="category-item-inactive" id="category2" onclick="filtering(6); filterChanger('category6')"><img src="css/system images/category icons/rice-meals-icon.png">Rice Meals</button>
                    <button class="category-item-inactive" id="category3" onclick="filtering(3); filterChanger('category3')"><img src="css/system images/category icons/sides-icon.png">Sides</button>
                    <button class="category-item-inactive" id="category5" onclick="filtering(5); filterChanger('category5')"><img src="css/system images/category icons/extras-icon.png">Extras</button>
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
                        <span><?php echo $_SESSION['first_name']; ?></span>
                    </div>
                </div>
                
                <br><br><br><br><br><br><br>
                
                <div id="cart-middle">
                    <span class="bold" style="font-size: 20px;">Your Cart</span><br>
                    <div id="cart-items-div">
                        <?php
                            cartDisplay();
                        ?>
                    </div>

                    <div id="fees-div">
                        <span class="end-to-end"><span class="bold">Subtotal</span><span>₱<?php $subtotal = subtotal(); echo $subtotal;?></span></span><br>
                        <span class="end-to-end"><span>Delivery Fee</span><span>₱0.00</span></span><br>
                        <hr id="cart-hr">
                        <span class="end-to-end bold"><span>Total</span><span>₱<?php echo $subtotal; ?></span></span>
                        <input type="radio" name="deliveryMode" id="pickup" value="pickup" class="deliveryBtn" onchange="radio('pickup')" required>
                        <input type="radio" name="deliveryMode" id="deliver" value="deliver" class="deliveryBtn" onchange="radio('deliver')" required>
                    </div> 
                </div>

                <br>

                <div id="cart-bottom">
                    Select Pick-up/Deliver: <br><br>
                    <div id="buttons">
                        <div id="upper-button">
                            <button class="upper button" id="pickupbtn" onclick="deliveryMode('pickup')">Pick-up</button>&nbsp;
                            <button class="upper button" id="deliverbtn" onclick="deliveryMode('deliver')"><img src="css/system images/menu icons/delivery.png" alt="Picture of motorcycle" height="60%" width="60%"></button> 
                        </div>
                        <div id="lower-button">
                           <button class="button" id="submit" onclick="checkout()">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class='popup' id='popup1'>
            <div>
                <img src="" alt="" id="extra-image">
            </div>
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
            function filtering(cat){
				let category;
				<?php
					require("php/config.php");

					$item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category < 4");
					while($item = mysqli_fetch_array($item_qry, MYSQLI_ASSOC)){
						$id = $item['product_id'];
				?>
				category = document.getElementById('cat'+<?php echo $id; ?>).value;

				if(cat == 'none' || cat == category){
					document.getElementById('card'+<?php echo $id; ?>).style.display="flex";
				}
				else{
					document.getElementById('card'+<?php echo $id; ?>).style.display="none";
				}

				<?php
					}
				?>
			}

            $ = function(id) {
                return document.getElementById(id);
            }
            
            var show = function(id) {
                $(id).style.display ='block';
            }
            var hide = function(id) {
                $(id).style.display ='none';
            }

            function addDetails(id){
                document.getElementById("id").value = id;
            }

            function addToCart(){
                var id = document.getElementById("id").value;
                document.getElementById("quantity"+id).value = document.getElementById("currentQty").value;
                document.getElementById("form"+id).submit();
            }

            function checkout(){
                window.location.href = "checkout-page.php";
            }

            function deliveryMode(type){
                let prefix = document.getElementById(type);
                let btn = document.getElementById(type+"btn");
                if(type == "pickup"){
                    prefix.checked = true;
                    btn.className = "clicked button";
                    document.getElementById("deliverbtn").className = "upper button";
                }
                else if(type == "deliver"){
                    prefix.checked = true;
                    btn.className = "clicked button";
                    document.getElementById("pickupbtn").className = "upper button";
                }
            }

            function radio(type){
                let prefix = document.getElementById(type);
                let btn = document.getElementById(type+"btn");
                if(prefix.checked == true){
                    btn.className = "clicked button";
                }
                else{
                    btn.className = "upper button";
                }
            }

            function getImage(id){
                // document.getElementById('extra-image').src = document.getElementById(id).src;
                console.log(document.getElementById(id).getAttribute("src")) ;
            }
        </script>
        
        
    </body>
</html>