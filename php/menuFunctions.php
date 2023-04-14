<?php
    function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category != 4");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            $id = $products['product_id'];
            echo"
            <a href='#' onclick='show(\"popup$products[product_category]\"); addDetails($id); getImage(\"img$id\", \"$products[product_name]\", $products[product_price], $id, $products[product_category]);' style=\"color:black; width:fit-content;\">
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
            ";
        }
    }

    function landingPageDisplay(){
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category != 4");
       

        // while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
        //     echo"
        //     <div class='menu-item'> 
        //         <img src='$products[product_image]' height='100%' width='75%'> <br>
        //         $products[product_name] <br>
        //     </div>";
        // }


            $current_num = 1;
        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            $count = mysqli_num_rows($products_qry);
            echo"
            
            <div class='slideshow-container'>
                <div class='mySlides fade'>
                    <div class='numbertext'>$current_num / $count</div>
                    <center><img src='$products[product_image]' class='prodDisplay'></center>
                    <div class='text'>$products[product_name]</div>
                </div>
          
            <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
            <a class='next' onclick='plusSlides(1)'>&#10095;</a>
          </div>
          <br>
            ";
            $current_num++;
        }

        // for($i = 1; $i < $current_num; $i++){
        //     echo"
        //     <div style='text-align:center'>
        //         <span class='dot' onclick='currentSlide($i)'></span>
        //     </div>
        // ";
        // }
        
    }

    function cartDisplay(){
        require("config.php");
        if(!isset($_SESSION)) 
        { 
        session_start(); 
        } 

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE customer_id = $_SESSION[customer_id]");

        if(mysqli_num_rows($cart_qry) == 0){
            echo"<center>Cart is empty.</center>";
        }

        while($products = mysqli_fetch_array($cart_qry, MYSQLI_ASSOC)){
            $item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
            
            while($item = mysqli_fetch_array($item_qry, MYSQLI_ASSOC)){
                // $subtotal = $products['quantity'] * $products['item_subtotal'];
                $subtotal = $products['item_subtotal'];
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
                                        $nameqry = mysqli_query($con, "SELECT product_name FROM products_tb WHERE product_id = $ingredients");

                                        $ingredients_name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
                                        echo $ingredients_name['product_name'].'<br>';
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

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE customer_id = $_SESSION[customer_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['item_subtotal']);
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


        
        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE `customer_id` = $_SESSION[customer_id] AND `status` = 'pending' OR `status` = 'deliver'");


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

    function invoiceInfo(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE customer_id = $_SESSION[invoice_id] AND cart_number = $_SESSION[invoice_cart]");
        while($info = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
            echo"
            <div class='order'>

            <p> Order #: $info[cart_number]</p>
            <p> Sold to: $info[cust_lname], $info[cust_fname]</p>
            <p> Order Date: $info[order_date]</p>
            <p> Order Time: $info[order_time]</p>
            <p> Sales Person: $info[staff_name]</p>
            <p>Mode of Payment: $info[payment_method]</p>
            <p> Mode of Acquirement: $info[acquirement_type]</p>

            </div>

        <hr>

        <h3> Note: $info[note]</h3>
            ";
        }
        
    }

    function invoiceItems(){
        require("config.php");

        function extraIngredients($ingredients, $prices){
            require("config.php");

            $ing = explode(",",$ingredients);
            $pri = explode(",",$prices);
            $i = 0;

            $count = count($ing);

            foreach($ing as $ingredient ){
                $qry = mysqli_query($con, "SELECT product_name FROM products_tb WHERE product_id = $ingredient");

                $name = mysqli_fetch_array($qry, MYSQLI_ASSOC);
                echo"
                    <div>^$name[product_name]</div>
                    <div>₱$pri[$i]</div><br>
                ";
                $i++;
            }
            echo "<br>";
            echo "<br>";
         
        }

        $qry = mysqli_query($con, "SELECT * FROM order_table WHERE customer_id = $_SESSION[invoice_id] AND cart_number = $_SESSION[invoice_cart]");

        while($items = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
            $nameqry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $items[product_id]");
            $name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
            $product = $name['product_price'] * $items['quantity'];

            echo"
            <div class='info'>

                <h5>
                    <div>$name[product_name]</div>
                    <div>₱$name[product_price]</div>
                    <div>x $items[quantity]</div>
                    <div>₱$product</div>
                </h5>
                <h5>";

                if($items['extra_ingredients'] != ""){
                    echo extraIngredients($items['extra_ingredients'], $items['extra_prices']);
                }

                echo"
                
                    
                </h5>
            </div> <br>
        ";
        }
        
    }

    function invoiceSubtotal(){
        require("config.php");
        $qry = mysqli_query($con, "SELECT total FROM order_info WHERE customer_id = $_SESSION[invoice_id] AND cart_number = $_SESSION[invoice_cart]");
        $info = mysqli_fetch_array($qry, MYSQLI_ASSOC);

        echo $info['total'] ;

    }

    function historyDisplay(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'done' || status = 'cancelled'");

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No past orders.</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <tr>
                        <td>#$order[cart_number]</td>
                        <td>$order[cust_fname]</td>
                        <td>$order[payment_method]</td>
                        <td>$order[order_date]</td>
                        <td>$order[acquirement_type]</td>
                        <td class='delivered'>$order[status]</td>
                        <td>₱ $order[total]</td>
                        <td><i class='fa-solid fa-ellipsis-vertical' id='icon-popup'></i></td>
                    </tr>
                ";
            }
        }

        // echo"
        //     <tr>
        //         <td>#110</td>
        //         <td>Jan Patrick</td>
        //         <td>COD</td>
        //         <td>10-21-22</td>
        //         <td>Delivery</td>
        //         <td class='delivered'>Delivered</td>
        //         <td>₱ 214.00</td>
        //         <td><i class='fa-solid fa-ellipsis-vertical' id='icon-popup'></i></td>
        //     </tr>
        // ";
    }


?>