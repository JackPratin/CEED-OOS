<?php
    require("config.php");
    session_start();

    $submit = $_POST['submit'];
    $id = $_POST['id'];

    if($submit == 'Delete'){
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