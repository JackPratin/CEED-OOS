<?php
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-product.php"; 
    }
    else{
        $_SESSION['current_admin_page'] = "admin-product.php";
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/admin functions.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Admin Product</title>
    </head>
    
    <body>
    <h1>Product Management</h1>
        <div class="center">
            <div class="productForm">
                <form action="php/addProduct.php" method="post" id="form" enctype="multipart/form-data"><br><br>
                    <b><div id="addProd">Add new product</div></b><br>
                        
                    Product details <br>
                    <input type="text" name="pName" class="prodInput" placeholder="Product Name" required>
                    <input type="text" name="price" class="prodInput" placeholder="Price" required><br>
                    <input type="text" name="qty" class="prodInput" placeholder="Quantity" required><br><br>


                    
                    <div class="container">
                        <!-- the select elemnt should go into div!!!!!  -->
                        <div class="custom-select" >
                        Product Category:<br><br>
                            <select name="category" class="categoryProd" id="" name="category">
                                <?php
                                    $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id != 4");
                                    while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                        echo"<option value='$category[category_id]'>$category[category_name]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div><br>
    
                    Product Image:<br><br>
                    <div class="file-upload">
                        <div class="file-select">
                            
                            <div class="file-select-button" id="fileName">Choose File</div>
                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                            <input type="file" name="image" id="chooseFile">
                        </div>
                    </div>

                    <br>
                    <input type="submit" value="Add Product" class="addProdBtn" id="prodSubmit">
                   
                </form>
            </div>

            <div style="width: 30%">
                <div class="productForm1">
                    <form action="php/addIngredient.php" method="post" id="form"><br><br>
                        <div id="addIngre"><b>Add new ingredient</b></div> <br>
                        <div>
                            Ingredients <br>
                            <input type="text" name="name" class="IngreInput" placeholder="Ingredient Name" required>
                            <input type="text" name="price" class="IngreInput" placeholder="Price" required>
                            <input type="text" name="qty" class="IngreInput" placeholder="Quantity" required>
                        
                        </div> <br>
                
                        <input type="submit" value="Add Ingredient" id="IngreSubmit">
                    </form>
                </div><br>

                <div class="productForm2">
                    <form action="php/addCategory.php" method="post" id="form"><br><br>
                        <div id="addIngre"><b>Add new category</b></div> <br>
                        <div>
                            <!-- Ingredients <br> -->
                            <input type="text" name="category" class="IngreInput" placeholder="Category Name" required>
                        
                        </div> <br>
                
                        <!-- <input type="submit" value="Add Ingredient" id="IngreSubmit"> -->
                        <input type="submit" value="Add Category" id="cateSubmit">
                    </form>
                </div>
            </div>
        </div>

        <br>
        <div class="orderHistory">
            <a href='#productTable'>PRODUCT TABLE</a>&nbsp;|&nbsp;<a href='#categoryTable'>CATEGORY TABLE</a>
            <table width="100%" id="productTable">
                <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th colspan="3">Actions</th>
                </tr>
                <?php
                    $ingredient_qry = mysqli_query($con, "SELECT * FROM `products_tb` WHERE product_category != 4");
                    while($products = mysqli_fetch_array($ingredient_qry, MYSQLI_ASSOC)){
                        echo"<form  method='post' action='php/productManagement.php'>
                            <tr>
                                <td>$products[product_name]</td>
                                <td><image src='$products[product_image]' width=30%; height=auto;></image></td>
                                <td><input type='submit' name='submit' value='Update' class='stock-actions' ></td>
                                <td><input type='submit' value='Delete' class='stock-actions'  name='submit'  onclick='confirm(\"Are you sure you want to delete $products[product_name] from the product list?\")'></td>
                            </tr>
                            <input type='hidden' name='id' value='$products[product_id]' >
                            </form>
                        ";
                    }
                ?>
            </table><br>
            
            <table width="100%" id="categoryTable">
                <tr>
                    <th>Category</th>
                    <th colspan="3">Actions</th>
                </tr>
                <?php
                    $ingredient_qry = mysqli_query($con, "SELECT * FROM `product_categories_tb`");
                    while($products = mysqli_fetch_array($ingredient_qry, MYSQLI_ASSOC)){
                        echo"<form  method='post' action='php/productManagement.php'>
                            <tr>
                                <td>$products[category_name]</td>
                                <td><input type='submit' name='submit' value='Update' class='stock-actions' ></td>
                                <td><input type='submit' value='Delete' class='stock-actions'  name='submit'  onclick='confirm(\"Are you sure you want to delete $products[category_name] from the product list?\")'></td>
                            </tr>
                            <input type='hidden' name='id' value='$products[category_id]' >
                            </form>
                        ";
                    }
                ?>
            </table>


            <div id="popup">
                <div id="popup-bg"></div>
                    <div id="popup-fg">
                        <div class="actions">
                            <button id="close">X</button>
                            <b><p class="header">Update product details</p></b>
                            <input type="text" name="fname" class="updateInput" placeholder="Name" required>
                            <p class="Qty">Quantity</p>
                            <div class="number-input">
                                <div id='counter'>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>

                                    <input class="quantity" id="currentQty" min="1" name="quantity" value="0" type="number">

                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button> 
                                </div>

                            </div>    
        
                            <div width="100%">     
                                    <input type="submit" value="Submit" class="updateBtn" onclick='addToCart()'>
                                    <?php
                                        echo"</form>";
                                    ?>
                        </div>                    
                    </div>
                </div>
            </div>

        </div>
    
      
        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/upload-file.js"></script>
    </body>
</html>