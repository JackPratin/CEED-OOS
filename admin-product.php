<?php
    require("php/config.php");
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
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
        <div class="center">
            <div class="productForm">
                <form action="php/addProduct.php" method="post" id="form" enctype="multipart/form-data"><br><br>
                    <b><div id="addProd">Add new product</div></b><br>
                        
                    Product details <br>
                    <input type="text" name="pName" class="prodInput" placeholder="Product Name">
                    <input type="text" name="price" class="prodInput" placeholder="Price">
                    <input type="text" name="qty" class="prodInput" placeholder="Quantity"><br><br>


                    
                    <div class="container">
                        <!-- the select elemnt should go into div!!!!!  -->
                        <div class="custom-select" >
                        Product Category:<br>
                            <select name="category" class="categoryProd" id="" name="category">
                                <?php
                                    $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id != 4");
                                    while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                        echo"<option value='$category[category_id]'>$category[category_name]</option>";
                                    }
                                ?>
                            </select>   <br>
                        </div>
                    </div>
    
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

            <div class="productForm1">
                <form action="php/addIngredient.php" method="post" id="form"><br><br>
                    <div id="addIngre"><b>Add new ingredient</b></div> <br>
                    <div>
                        Ingredients <br>
                        <input type="text" name="name" class="IngreInput" placeholder="Ingredient Name">
                        <input type="text" name="price" class="IngreInput" placeholder="Price">
                        <input type="text" name="qty" class="IngreInput" placeholder="Quantity">
                       
                    </div> <br>
            
                    <input type="submit" value="Add Ingredient" id="IngreSubmit">
                </form>
            </div>

            <div class="productForm2">
                <form action="php/addIngredient.php" method="post" id="form"><br><br>
                    <div id="addIngre"><b>Add new category</b></div> <br>
                    <div>
                        Ingredients <br>
                        <input type="text" name="name" class="IngreInput" placeholder="Ingredient Name">
                        <input type="text" name="price" class="IngreInput" placeholder="Price">
                        <input type="text" name="qty" class="IngreInput" placeholder="Quantity">
                       
                    </div> <br>
            
                    <!-- <input type="submit" value="Add Ingredient" id="IngreSubmit"> -->
                    <input type="submit" value="Add Ingredient" id="cateSubmit">
                </form>
            </div>

        </div>
        <br>
    
      
        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/upload-file.js"></script>
    </body>
</html>