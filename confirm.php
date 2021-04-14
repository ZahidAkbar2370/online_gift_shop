<?php


// Start the session
// session_start();
@include('header.php');
include("connection.php");

if(isset($_SESSION["Order"]))
{
    
    $Order = $_SESSION['Order'];

  $totalamount = 0;

	foreach ($Order as $orderlineitem)
	{
		
    $tPrice=$orderlineitem->price*$orderlineitem->quantity;

		 $totalamount = $totalamount + $tPrice;

	}

  $user = $_SESSION['user'];
  $buyer_id=$user['buyer_id'];

  $add_order = "insert into buyer_orders (buyer_id,pro_price) values ( ".$buyer_id." , ". $totalamount .")";

	$exe_brand = mysqli_query($con, $add_order);



foreach ($Order as $orderlineitem1)
  {


     $add_order_detail = "insert into order_detail (order_id,pro_id,qty) values ( ".$con->insert_id." , ". $orderlineitem1->pro_id .",".$orderlineitem1->quantity.")";

    $exe_brand1 = mysqli_query($con, $add_order_detail);


  }
 
 unset($_SESSION['Order']);



    
      echo "<script>window.open('cart.php','_self')</script>";
      die();


}



?>