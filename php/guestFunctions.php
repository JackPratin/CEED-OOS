<?php
     function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category != 4");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            $id = $products['product_id'];
            echo"
            <a href='#' onclick='show(\"popup$id\"); addDetails($id); ' style=\"color:black; width:fit-content;\">
                <div class='menu-item' id='card$id'>
                    <div class='menu-details'>$products[product_name] <br><br> ₱$products[product_price]</div>

                    <div>
                    <img src='$products[product_image]' height='100%' width='75%' id='img$id'> </div> 
                    <input type='hidden' value='$products[product_category]' id='cat$id'>

                    
                    <input type='hidden' value='$id' name='id'>
                    <input type='hidden' value='$id' name='id$id'>
                    <input type='hidden' value='' id='quantity$id' name='quantity'>
                    <input type='hidden' value='$products[product_category]' id='cat$id'>
                    <input type='hidden' value='$products[product_price]' name='price'>
                </div>
            </a>

            <div class='popup' id='popup$id'>
                <div id='item-div'>
                    <img src='$products[product_image]' alt='Item image' id='extra-image' width='50%' height='50%'>&nbsp;
                    <div style='display:flex; flex-direction:column;'>
                        <h2 id='extra-name'>$products[product_name]</h2>
                        <h3 id='extra-price'>₱$products[product_price]</h3>
                    </div>
                    <span class='cls'><button href='#' onclick='hide(\"popup$id\")'>X</button></span>
                </div>
                <div id='extras-div'>
                    <div style='display:flex; justify-content: space-between;'>
                        
                    ";

                        

                        //loops through product names of ingredients
                        


                            // $extras_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category = 4");

                            //     while($extras = mysqli_fetch_array($extras_qry,MYSQLI_ASSOC)){
                            //     echo"
                            //         <div style=\"display:flex; justify-content: space-between;\";>
                            //             <span>
                            //                 <input type='checkbox' class='checkbox' name=\"extras[]\" value='$extras[product_id]' id='extra-checkbox'> $extras[product_name]
                            //             </span> 
                            //             <span>
                            //                 ₱$extras[product_price]
                            //             </span>
                            //         </div>
                                    
                            //         ";
                        // }


                            $prod_adds_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
                            $cat_adds_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id = $products[product_category]");

                            $prod_query = mysqli_fetch_array($prod_adds_qry,MYSQLI_ASSOC);
                            $cat_query = mysqli_fetch_array($cat_adds_qry,MYSQLI_ASSOC);
                            // $ingredients = '';

                            if($prod_query['has_additionals'] == 'yes'){
                                $ingredients = explode(", ",$prod_query['product_additionals']);
                                
                            }
                            else if($cat_query['has_additionals'] == 'yes'){ 
                                $ingredients = explode(", ",$cat_query['category_additionals']);
                            }

                            if($prod_query['has_additionals'] == 'yes' || $cat_query['has_additionals'] == 'yes'){
                                echo"<span>Recommended Extras</span>
                        
                                </div><br>
                                Select additional ingredients(optional)<br>
                                <div style='display:flex; flex-direction:column;'>
                                    <form method='post' action='php/addtocart.php' id='form$id'>";
                                foreach($ingredients as $ingredients){

                                    $nameqry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = '$ingredients'");
        
                                    $ingredients_name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
                                    // echo $ingredients_name['product_name'];


                                    echo"
                                        <div style=\"display:flex; justify-content: space-between;\";>
                                            <span>
                                                <input type='checkbox' class='checkbox' name=\"extras[]\" value='$ingredients_name[product_id]' id='extra-checkbox'> $ingredients_name[product_name]
                                            </span> 
                                            <span>
                                                ₱$ingredients_name[product_price]
                                            </span>
                                        </div>
                                    
                                    ";
                                }
                            }
                           
                                    // echo"<input type='checkbox'> &nbsp; Bacon";
                                
                                
                                echo"
                                <input type='hidden' value='$id' id='form-id' name='id'>
                                <input type='hidden' value='$products[product_name]' id='form-name' name='name'>
                                <input type='hidden' value='$products[product_category]' id='form-category' name='category' >
                                <input type='hidden' value='$products[product_price]' id='form-price' name='price'>
                        </form>
                                <br>
                        <div class='number-input'>
                            <div id='counter'>
                                <button onclick='this.parentNode.querySelector(\"input[type=number]\").stepDown()' ></button>

                                <input class='quantity' id='currentQty' min='1' name='quantity' value='1' type='number' form='form$id'>

                                <button onclick='this.parentNode.querySelector(\"input[type=number]\").stepUp()' class='plus'></button> 
                            </div>

                            <div width='100%'>     
                                <input type='submit' value='Add to Cart' class='addCart' onclick=\"addToCart($id)\">
                                
                                    </form>
                                <!-- hide('popup1') -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    }

    function cartDisplay(){
        require("config.php");

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE guest_id = $_SESSION[guest_id]");

        if(mysqli_num_rows($cart_qry) == 0){
            echo"<center>Cart is empty.</center>";
        }

        while($products = mysqli_fetch_array($cart_qry, MYSQLI_ASSOC)){
            $item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
            
            while($item = mysqli_fetch_array($item_qry, MYSQLI_ASSOC)){
                $subtotal = $products['quantity'] * $item['product_price'];
                echo"
                <div id='cart-items'>
                    <div id='item-img'>
                        <img src='$item[product_image]' alt='1975 Old-Fashioned Burgers logo' height='60px' width='60px' style='border-radius: 10px;'>
                    </div>&nbsp; 
                    <div id='item-details' class='bold'>
                        <span class='end-to-end'>$item[product_name] 
                        <form method='post' action='php/deleteFromCart.php'>
                            <input type='hidden' name='cart_id' value='$products[cart_id]'>
                            <button type='submit'>X</button>
                        </form>
                        </span>
                        <span class='end-to-end'> 
                            <span>
                                <span class='span-x'>x </span>
                                $products[quantity]
                            </span> 
                            <span id='item-price' class='span-x'>₱$subtotal</span>
                        </span>
                    </div>
                </div> <br>";
            }
            
        }
    }

    function subtotal(){
        require("config.php");

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE guest_id = $_SESSION[guest_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['price']);
        }

        return $subtotal;

    }

    function trackOrderDisplay(){
        require("config.php");

        function name($id){
            require("config.php");
            $qry = mysqli_query($con, "SELECT product_name FROM products_tb WHERE product_id = $id");

            $name = mysqli_fetch_array($qry, MYSQLI_ASSOC);
            return $name['product_name'];
        }

        function price($id){
            require("config.php");
            $qry = mysqli_query($con, "SELECT product_price FROM products_tb WHERE product_id = $id");

            $price = mysqli_fetch_array($qry, MYSQLI_ASSOC);
            return $price['product_price'];
            
        }

        function ingredients($ingredients, $prices){
            require("config.php");

            $ing = explode(",",$ingredients);
            $pri = explode(",",$prices);
            $i = 0;

            $count = count($ing);

            foreach($ing as $ingredient ){
                $qry = mysqli_query($con, "SELECT product_name FROM products_tb WHERE product_id = $ingredient");

                $name = mysqli_fetch_array($qry, MYSQLI_ASSOC);
                echo "<span class='order-card-items'><span>&nbsp;+".$name['product_name']."</span> <span>₱".$pri[$i]."</span></span>";
                $i++;
            }
            echo "<br>";
            
        }


        
        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE `guest_id` = $_SESSION[guest_id] AND `status` = 'pending' OR `status` = 'deliver'");


        if(mysqli_num_rows($qry) == 0){
            echo"
            
            <div class='tracking'>
                <h4>No active order</h4>
                    <div class='order-status'>
                        <div class='inner-order-status'>
                            <div class=' circle' id='placeCircle'></div>
                            <img src='css/system images/order list icons/order-placed-icon.png' alt='Icon for placed order'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Order Placed</div>
                                <div class='order-lower-text'>We have received your order, please wait for a staff to accept your order.</div>
                            </div>
                        </div>

                        <div class='vertical-line'></div>

                        <div class='inner-order-status'>
                            <div class='circle' id='processCircle'></div>&nbsp;
                            <img src='css/system images/order list icons/processed-icon.png' alt='Icon for order processing'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Order Accepted</div>
                                <div class='order-lower-text'>We are currently preparing your order.</div>
                            </div>
                        </div>

                        <div class='vertical-line'></div>

                        <div class='inner-order-status'>
                            <div class='circle' id='readyCircle'></div>&nbsp;
                            <img src='css/system images/order list icons/ready-icon.png' alt='Icon for ready to deliver items'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Ready to Deliver</div>
                                <div class='order-lower-text'>Your order is ready to be deliverd, please wait for our rider to deliver your order.</div>
                            </div>
                        </div>
                    </div>
                </div>
            ";


        }
        else{

            while($orders = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                $itemsQry = mysqli_query($con, "SELECT * FROM order_table WHERE `customer_id` = $_SESSION[customer_id] AND cart_number = $orders[cart_number]"); 

                
                    echo"
                        <div class='tracking'>
                        <form action='php/receiptSetter.php' id='form$orders[cart_number]' method='post'>
                        <input type='hidden' name='cart' value='$orders[cart_number]'>
                        </form>
                            <a href='#' onclick='sub($orders[cart_number])'>
                                <div class='order-card'>
                                    <b>Order #$orders[cart_number]</b><br>
                                    <span style='color: \'gray\''>$orders[order_date], $orders[order_time]</span><br><br>";
                while($items = mysqli_fetch_array($itemsQry, MYSQLI_ASSOC)){
                    $id = $items['product_id'];
                    echo "<hr width='50%'>";
                    echo "<span class='order-card-items'><span>$items[quantity]x ".name($id)."</span> <span>₱".price($id)."</span></span>";
                    if($items['extra_ingredients'] != ""){
                        echo ingredients($items['extra_ingredients'], $items['extra_prices']);
                    }
                }
                
                    $subQry = mysqli_query($con, "SELECT total FROM order_info WHERE `customer_id` = $_SESSION[customer_id] AND cart_number = $orders[cart_number]");
                while($sub = mysqli_fetch_array($subQry, MYSQLI_ASSOC)){
                    echo "
                        <hr>
                        <span class='order-card-bottom'>x1 Item/s<br>₱ $sub[total]</span>
                    ";
                }
                echo"
                            
                        <form method='post' action='php/cancelOrder.php'>
                            <input type='hidden' name='cart_number' value='$orders[cart_number]'>
                            <input type='submit' value='Cancel order' onclick='confirm(Are you sure you want to cancel this order?)'>
                        </form>        
                                    
                                </div>
                            </a>
                            

                            <div class='order-status'>
                                <div class='inner-order-status'>
                                    <div class='circle-active circle' id='placeCircle'></div>
                                    <img src='css/system images/order list icons/order-placed-icon.png' alt='Icon for placed order'>
                                    <div class='order-text'>
                                        <div class='order-upper-text'>Order Placed</div>
                                        <div class='order-lower-text'>We have received your order, please wait for a staff to accept your order.</div>
                                    </div>
                                </div>

                                <div class='vertical-line'></div>

                                <div class='inner-order-status'>
                                    <div class='circle' id='processCircle'></div>&nbsp;
                                    <img src='css/system images/order list icons/processed-icon.png' alt='Icon for order processing'>
                                    <div class='order-text'>
                                        <div class='order-upper-text'>Order Accepted</div>
                                        <div class='order-lower-text'>We are currently preparing your order.</div>
                                    </div>
                                </div>

                                <div class='vertical-line'></div>

                                <div class='inner-order-status'>
                                    <div class='circle' id='readyCircle'></div>&nbsp;
                                    <img src='css/system images/order list icons/ready-icon.png' alt='Icon for ready to deliver items'>
                                    <div class='order-text'>
                                        <div class='order-upper-text'>Ready to Deliver</div>
                                        <div class='order-lower-text'>Your order is ready to be deliverd, please wait for our rider to deliver your order.</div>
                                    </div>
                                </div>
                            </div>
                        </div><hr width='50%'><br>
                        
                    ";
                

            }
            
        }


        
    }
?>