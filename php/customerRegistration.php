<?php
    require("config.php");

    if (isset($_POST['username_check'])) {
        
        $username   = mysqli_real_escape_string($con, $_POST['username']);
        $results = mysqli_query($con, "SELECT * FROM `customer_tb` WHERE username='$username'");
        if (mysqli_num_rows($results) > 0) {
          echo "taken";	
        }else{
          echo 'not_taken';
        }
        exit();
    }
    if (isset($_POST['email_check'])) {
        
        $email      = mysqli_real_escape_string($con, $_POST['email']);
        $results = mysqli_query($con, "SELECT * FROM `customer_tb` WHERE email='$email'");
        if (mysqli_num_rows($results) > 0) {
          echo "taken";	
        }else{
          echo 'not_taken';
        }
        exit();
    }
    if (isset($_POST['email'])) {
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
    
        $hash_password = hash('sha256', $password);

        $sql = "SELECT * FROM customer_tb WHERE username='$username'";
        $results = mysqli_query($con, $sql);
        if (mysqli_num_rows($results) > 0) {
          echo "exists";	
          exit();
        }else{
            

            mysqli_query($con, "INSERT INTO `customer_tb`(`first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`, `address`, `baranggay`, `city`, `username`, `password`) VALUES ('$fname','$mi','$lname','$contact','$email','1','$address','$brgy','$city','$username', '$hash_password')");

            // echo 'Saved!';
            echo "<script>alert('Account created.');</script>";
            echo '<script>window.location="../index.php"</script>';
            exit();
        }
    }


    // mysqli_query($con, "INSERT INTO `customer_tb`(`first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`, `address`, `baranggay`, `city`, `username`, `password`) VALUES ('$fname','$mi','$lname','$contact','$email','1','$address','$brgy','$city','$username', '$hash_password'
    // )");

    
    
?>