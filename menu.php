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
        $_SESSION['current_page'] = "menu.php";
    }

    // if(isset($_GET['queryid'])){
    //     $queryid = $_GET['queryid'];
    // }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/contents.css">
        <title>Menu</title>
    </head>
    
    <body>
        <div id="menu-div">
     
            <div id="main-menu">
                <img src="css/ad banner/sample ads.png" class="banner"> <br>

                <div id="top-main-menu">
               
                    <p id="choose-category">
                        CHOOSE CATEGORY
                    </p>
                    <div class="menuBar" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <!-- <i class="fa-solid fa-cart-plus"></i>
                    <center>
                        <input type="search" name="" id="search" placeholder="Search category or menu...">
                    </center> -->
                </div> <br>

                <div id="categories">
                    <select name="" id="" onchange="filtering(this.value)">
                    <option value="none" selected>All</option>
                        <?php
                            $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE on_menu = 'yes'");

                            while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                echo "<option value='$category[category_id]'>$category[category_name]</option>";
                            }
                        ?>
                    </select>
                
                    <!-- <button class="category-item-active" id="category0" onclick="filtering('none'); filterChanger('category0')"><img src="css/system images/category icons/all-icon.png"><center>All</center></button>
                    <button class="category-item-inactive" id="category1" onclick="filtering(1); filterChanger('category1')"><img src="css/system images/category icons/burger-icon.png"><center>Burgers</center></button>
                    <button class="category-item-inactive" id="category2" onclick="filtering(2); filterChanger('category2')"><img src="css/system images/category icons/chick'n-icon.png">Chicken</button>
                    <button class="category-item-inactive" id="category2" onclick="filtering(6); filterChanger('category6')"><img src="css/system images/category icons/rice-meals-icon.png">Rice Meals</button>
                    <button class="category-item-inactive" id="category3" onclick="filtering(3); filterChanger('category3')"><img src="css/system images/category icons/sides-icon.png">Sides</button>
                    <button class="category-item-inactive" id="category5" onclick="filtering(5); filterChanger('category5')"><img src="css/system images/category icons/extras-icon.png">Extras</button> -->
                </div> <br>
                <div id="categoryDropdown">
                    <select name="category" id="">
                        
                        <?php
                            $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id != 4");

                            while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                echo "<option value='$category[category_id]'>$category[category_name]</option>";
                            }
                        ?>
                    </select>
                </div>

                <div id="menu-name">
                    Burger Menu
                </div> <br>

                <div id="item-list">
                    <?php itemDisplay(); ?>
                </div>

                <br>
                <br>

                

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
                        <!-- <span class="end-to-end"><span>Delivery Fee</span><span>₱0.00</span></span><br>
                        <hr id="cart-hr">
                        <span class="end-to-end bold"><span>Total</span><span>₱<?php //echo $subtotal; ?></span></span> -->
                        <br>
                        <input type="radio" name="deliveryMode" id="pickup" value="pickup" class="deliveryBtn" onchange="radio('pickup')" required form="checkout">
                        <input type="radio" name="deliveryMode" id="deliver" value="deliver" class="deliveryBtn" onchange="radio('deliver')" required form="checkout">
                        <input type="hidden" name="subtotal" id='subtotal' value="<?php echo $subtotal; ?>" form="checkout">
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
                    <a></a><br>
                    <a></a><br>
                    <center>
                        <a href='Terms-and-conditions.html'>
                            Terms and Conditions
                        </a>
                    </center>
                    <br>
                </div>
                
                <div>
                    <center>
                        For news and updates, follow us:<br> <br> 
                        <div id="socials">
                            <a href="https://www.facebook.com/1975OldFashionedBurgers" target="_top"><img src='css/system images/fb.png'></a>
                            <a href="https://www.instagram.com/1975_oldfashionedburgers/" target="_top"><img src='css/system images/ig.png'></a>
                        </div>
                    </center>
                </div>
            </footer>
        </div>
        <form action="checkout-page.php" method="post" id="checkout"></form>
        

        <script src="js/navigation.js"></script>

        <script>
            function filtering(cat){
				let category;
				<?php
					require("php/config.php");

					$item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category");
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
                $(id).style.display ='flex';
            }
            var hide = function(id) {
                $(id).style.display ='none';
            }

            function addDetails(id){
                document.getElementById("id").value = id;
            }

            function addToCart(id){
                // var id = document.getElementById("id").value;
                // document.getElementById("quantity"+id).value = document.getElementById("currentQty").value;
                document.getElementById("form"+id).submit();
            }

            function checkout(){
                if(document.getElementById('subtotal').value == 0){
                    alert("Cart is empty.");
                }
                else{
                    document.getElementById("checkout").submit();
                }
            }

           

            

            function getImage(imageId, name, price, id, category){
                // document.getElementById('extra-image').src = document.getElementById(id).src;
                let imgsrc = document.getElementById(imageId).getAttribute("src");
                document.getElementById("extra-image").src = imgsrc;
                document.getElementById("extra-image").style.height = '50%';
                document.getElementById("extra-image").style.width = '50%';

                document.getElementById("extra-name").textContent = name;
                document.getElementById("extra-price").textContent = price;
                document.getElementById("form-name").value = name;
                document.getElementById("form-price").value = price;
                document.getElementById("form-id").value = id;
                document.getElementById("form-category").value = category;

            //     var xhttp = new XMLHttpRequest();
            //     xhttp.onreadystatechange = function() {
            //         if (this.readyState == 4 && this.status == 200) {
            //             // Response from PHP script
            //             console.log(this.responseText);
            //         }
            //     };
            //     xhttp.open("GET", "menu.php?id=" + queryid, true);
            //     xhttp.send();
            }
        </script>
       <script>
            function myFunction(x) {
            x.classList.toggle("change");
            }
        </script>
        
    </body>
</html>