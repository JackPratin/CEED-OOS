<?php
    require("config.php");

    $fname      = mysqli_real_escape_string($con, $_POST['fname']);
    $lname      = mysqli_real_escape_string($con, $_POST['lname']);
    $mi         = mysqli_real_escape_string($con, $_POST['mi']);
    $contact    = mysqli_real_escape_string($con, $_POST['contact']);
    $email      = mysqli_real_escape_string($con, $_POST['email']);
    $password   = mysqli_real_escape_string($con, $_POST['password']);
    $address    = mysqli_real_escape_string($con, $_POST['address']);
    $brgy       = mysqli_real_escape_string($con, $_POST['brgy']);
    $city       = mysqli_real_escape_string($con, $_POST['city']);
    $username   = mysqli_real_escape_string($con, $_POST['username']);
  
    mysqli_query($con, "INSERT INTO `customer_tb`( `first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`) VALUES ('$fname','$mi','$lname','$contact','$email','0')");

    mysqli_query($con, "INSERT INTO `customer_tb`(`first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`, `address`, `baranggay`, `city`, `username`, `password`) VALUES ('$fname','$mi','$lname','$contact','$email','0','$address','$brgy','$city','$username', $password)");

    

    echo '<script>window.location="../index.php"</script>';
?>