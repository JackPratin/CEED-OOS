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
    $type       = mysqli_real_escape_string($con, $_POST['type']);
  
    $hash_password = hash('sha256', $password);

    mysqli_query($con, "
    INSERT INTO `employee_tb`(`employee_type`, `first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `address`, `baranggay`, `city`, `username`, `password`) VALUES ('$type','$fname','$mi','$lname','$contact','$email','$address','$brgy','$city','$username','$hash_password'
    )
    ");

    
    echo "<script>alert('Account created.');</script>";
    echo '<script>window.location="../admin-add-user.php"</script>';
?>


