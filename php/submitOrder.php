<?php
    require("config.php");
    session_start();

      $date           = mysqli_real_escape_string($con, $_POST['date']) ;
      $time           = mysqli_real_escape_string($con, $_POST['time']) ;
      $address        = mysqli_real_escape_string($con, $_POST['address']) ;
      $baranggay      = mysqli_real_escape_string($con, $_POST['baranggay']) ;
      $city           = mysqli_real_escape_string($con, $_POST['city']) ;
      $note           = mysqli_real_escape_string($con, $_POST['note']) ;
      $gcashProof     = mysqli_real_escape_string($con, $_POST['gcashProof']) ;
      $email          = mysqli_real_escape_string($con, $_POST['email']) ;
      $fname          = mysqli_real_escape_string($con, $_POST['fname']) ;
      $lname          = mysqli_real_escape_string($con, $_POST['lname']) ;
      $number         = mysqli_real_escape_string($con, $_POST['number']) ;
      $subtotal       = mysqli_real_escape_string($con, $_POST['subtotal']) ;
      $deliveryMode   = mysqli_real_escape_string($con, $_POST['deliveryMode']) ;
      $modeOfPayment  = mysqli_real_escape_string($con, $_POST['modeOfPayment']) ;

    $current_time = new DateTime('now',new DateTimeZone('Asia/Manila'));
    $ddate = new DateTime($date,new DateTimeZone('Asia/Manila'));
    $dtime = new DateTime($time,new DateTimeZone('Asia/Manila'));
    // echo $date->format('g:i:s A'); time
    // echo $date->format('l, F j Y'); date
    $current_date = $current_time ->format('F j Y');
    $date = $ddate ->format('F j Y');
    $current_time = $current_time ->format('g:i A');
    $time = $dtime ->format('g:i A');

    $item_count_qry = mysqli_query($con,"SELECT SUM(`quantity`) AS sumqty FROM cart_tb WHERE customer_id = $_SESSION[customer_id] AND cart_number = $_SESSION[order_count];");
    $quantity = mysqli_fetch_array($item_count_qry, MYSQLI_ASSOC);

    $info_qry = mysqli_query($con, "INSERT INTO `order_info`(`order_date`, `order_time`, `cart_number`, `number_of_items`, `customer_id`, `cust_fname`, `cust_lname`, `cust_address`, `cust_baranggay`, `cust_city`, `cust_contact`, `cust_email`, `acquirement_type`, `del_pickup_time`, `del_pickup_date`, `payment_method`, `ordered_from`, `total`, `status`, `note`) VALUES ('$current_date','$current_time','$_SESSION[order_count]','$quantity[sumqty]','$_SESSION[customer_id]','$fname','$lname','$address','$baranggay','$city','$number','$email','$deliveryMode','$time','$date','$modeOfPayment','website','$subtotal','pending','$note')");

    $item_transfer = mysqli_query($con, "SELECT * FROM cart_tb WHERE customer_id = $_SESSION[customer_id] AND cart_number = $_SESSION[order_count]");

    while($items = mysqli_fetch_array($item_transfer, MYSQLI_ASSOC)){
        $transfer_qry = mysqli_query($con, "INSERT INTO `order_table`(`order_date`, `cart_number`, `item_number`, `customer_id`, `price`, `quantity`, `extra_ingredients`, `extra_prices`, `product_id`) VALUES ('$current_date','$items[cart_number]','$items[item_number]','$items[customer_id]','$items[price]','$items[quantity]','$items[extra_ingredients]','$items[extra_prices]','$items[product_id]')");

        $delete_qry = mysqli_query($con, "DELETE FROM `cart_tb` WHERE cart_id = $items[cart_id]");
    }

    $_SESSION['order_count']++;

    $order_count_update = (mysqli_query($con, "UPDATE `customer_tb` SET `order_count`='$_SESSION[order_count]' WHERE customer_id = $_SESSION[customer_id];"));

    $_SESSION['current_page'] = "order-list.php";

    echo '<script>window.location="../order-list.php"</script>';
?>