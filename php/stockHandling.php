<?php
    require("config.php");
    session_start();

    $submit = $_POST['submit'];
    $id = $_POST['id'];

    if($submit == 'Delete'){
        $category_qry = mysqli_query($con, "SELECT * FROM `product_categories_tb`");
        echo"<script>var str;</script>";
        while($ingredient = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
            $additionals = $ingredient['category_additionals'];
            // makes an array of ingredients id
            $individual_additional = explode(", ", $additionals);

            // makes an array of an id that will be removed
            $id_array = array($id);
            
            // differentiate 2 arrays
            $new_additional = array_diff($individual_additional, $id_array);
            
            
            $save = "";
            $new_array = array();
            
            foreach($new_additional as $new){
                array_push($new_array, $new);
            }
            
            // getting the total number of array objects
            $additional_count = count($new_array);

            for($i= 0; $i< $additional_count; $i++){
                if($new_array[$i] != ""){
                    if(0 == $i){
                        $save = $save.$new_array[$i];
                        }
                    else{
                        $save = $save.", ".$new_array[$i];
                    }
                }
            }
            mysqli_query($con, "UPDATE `product_categories_tb` SET `category_additionals`='$save' WHERE category_id = $ingredient[category_id]");
        }

        
        mysqli_query($con, "DELETE FROM `ingredients_tb` WHERE `item_id`= $id");
        echo '<script>alert("Ingredient deleted.")</script>';
        echo '<script>window.location="../admin-stock-monitoring.php"</script>';
    }
    else if($submit == 'Replacement/loss'){
        echo"<form method='post' id='loss' action='../admin-loss-recording.php'>
        <input type='hidden' name='id' value='$_POST[id]'>
        </form>";
        // echo '<script>alert("Product marked a loss.")</script>';
        echo '<script>document.getElementById("loss").submit();</script>';
    }
    else if($submit == 'Update'){
        echo"<form method='post' id='update' action='../admin-stock-update.php'>
        <input type='hidden' name='id' value='$_POST[id]'>
        </form>";
        echo '<script>document.getElementById("update").submit();</script>';
    }


    

?>