<?php
    require("config.php");
    session_start();
    
    $_SESSION['fname']          = mysqli_real_escape_string($con, $_POST['fname']);
    $_SESSION['lname']          = mysqli_real_escape_string($con, $_POST['lname']);
    $_SESSION['mi']             = mysqli_real_escape_string($con, $_POST['mi']);
    $_SESSION['contact']        = mysqli_real_escape_string($con, $_POST['contact']);
    $_SESSION['email']          = mysqli_real_escape_string($con, $_POST['email']);
    $_SESSION['address']        = mysqli_real_escape_string($con, $_POST['address']);
    $_SESSION['brgy']           = mysqli_real_escape_string($con, $_POST['brgy']);
    $_SESSION['city']           = mysqli_real_escape_string($con, $_POST['city']);
    $_SESSION['account_type']   = 'guest';
    $_SESSION['order_count']    = 0;

    $qry1 = mysqli_query($con, "SELECT * FROM `guest_tb` ORDER BY guest_id DESC LIMIT 1");
    if($id = mysqli_fetch_array($qry1, MYSQLI_ASSOC)){
        $_SESSION['guest_id'] = $id['guest_id']+1;
    }
    else{
        $_SESSION['guest_id'] = 0; 
    }

    $qry = mysqli_query($con, "INSERT INTO `guest_tb`( `first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`, `address`, `baranggay`, `city`) VALUES ('$_SESSION[fname] ','$_SESSION[mi]  ','$_SESSION[lname]','$_SESSION[contact]','$_SESSION[email]','$_SESSION[order_count]','$_SESSION[address]','$_SESSION[brgy]','$_SESSION[city]')");

    

    
   

    echo '<script>window.location="../guest-main.php"</script>';
?>