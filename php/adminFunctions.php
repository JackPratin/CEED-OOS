<?php
    function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category ");

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
                    <img src='$products[product_image]' alt='Item image' id='extra-image' width='45%' height='auto'>&nbsp;
                    <div style='display:flex; flex-direction:column;'>
                        <h2 id='extra-name'>$products[product_name]</h2>
                        <h3 id='extra-price'>₱$products[product_price]</h3>
                    </div>
                    
                </div>
                <div id='extras-div'>
                
                    <span class='cls'><button href='#' onclick='hide(\"popup$id\")'>X</button></span>

                    <div style='display:flex; justify-content: space-between;'>
                        <form method='post' action='php/addtocart.php' id='form$id'>
                            ";
                                $prod_adds_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
                                
                                $prod_query = mysqli_fetch_array($prod_adds_qry,MYSQLI_ASSOC);
                                
                                if($prod_query['has_additionals'] == 'yes'){
                                    $ingredients = explode(", ",$prod_query['product_additionals']);
                                }
                            

                                if($prod_query['has_additionals'] == 'yes'){
                                    echo"
                            <span>Recommended Extras</span>
                            
                                    
                            Select additional ingredients(optional)<br>
                            <div style='display:flex; flex-direction:column;'>
                                    ";
                                    foreach($ingredients as $ingredients){

                                        if($ingredients == ""){
                                            continue;
                                        }

                                        $nameqry = mysqli_query($con, "SELECT * FROM ingredients_tb WHERE item_id = '$ingredients'");
            
                                        $ingredients_name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
                                        // echo $ingredients_name['product_name'];

                                        // <input type='checkbox' class='checkbox' name=\"extras[]\" value='$ingredients_name[item_id]' id='extra-checkbox' form='form$id'> $ingredients_name[item_name]

                                        echo"
                                <div style=\"display:flex; justify-content: space-between;\";>
                                <span>
                                    <input type='checkbox' class='checkbox' name=\"extras[]\" value='$ingredients' id='extra-checkbox' form='form$id'> $ingredients_name[item_name]
                                </span> 
                                <span>
                                    ₱$ingredients_name[item_price]
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
                                <br>

                                <div class='number-input'>
                                    <div id='counter'>
                                        <button type='button' onclick='this.parentNode.querySelector(\"input[type=number]\").stepDown()' ></button>

                                        <input class='quantity' id='currentQty' min='1' name='quantity' value='1' type='number' form='form$id'>

                                        <button type='button' onclick='this.parentNode.querySelector(\"input[type=number]\").stepUp()' class='plus'></button> 
                                    </div>

                                    <div width='100%'>     
                                        <input type='submit' value='Add to Cart' class='addCart' onclick='addToCart($id)'>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            ";
        }
    }

    function cartDisplay(){
        require("config.php");

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE employee_id = $_SESSION[employee_id]");

        if(mysqli_num_rows($cart_qry) == 0){
            echo"<center>Cart is empty.</center>";
        }

        while($products = mysqli_fetch_array($cart_qry, MYSQLI_ASSOC)){
            $item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
            
            while($item = mysqli_fetch_array($item_qry, MYSQLI_ASSOC)){
                // $subtotal = $products['quantity'] * $item['product_price'];
                $subtotal = $products['item_subtotal'];
                $id = $item['product_id'];
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
                        <span>";
                       

                        //if ingredient is not empty
                        if($products['extra_ingredients'] != ""){
                            echo "Extra: <br>";

                            //string to array
                            $ingredients = explode(",",$products['extra_ingredients']);

                            //loops through product names of ingredients
                            foreach($ingredients as $ingredients){
                                $nameqry = mysqli_query($con, "SELECT * FROM ingredients_tb WHERE item_id = $ingredients");

                                $ingredients_name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
                                echo $ingredients_name['item_name'].'<br>';
                            }
                        }
                    
                echo"</span>
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

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE employee_id = $_SESSION[employee_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['price']);
        }

        return $subtotal;

    }

    function pendingList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'pending'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No pending orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>";
                            if($order['gcash_paid'] == 'no' && $order['payment_method'] == 'gcash' ){
                                echo"<input type='submit' name='submit' value='Gcash Payment Received'>";
                            }
                            echo"
                            <input type='submit' name='submit' value='Prepare'>
                            <input type='submit' name='submit' value='Remove'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }

    function preparationList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'preparing'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No in-preparation orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>
                            <input type='submit' name='submit' value='Deliver'>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }

    function deliveryList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'delivering'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No in-delivery orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>
                            <input type='submit' name='submit' value='Done'>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }


?>