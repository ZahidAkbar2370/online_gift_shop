<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="background-color: #002347  !important">

<!--Header-part-->
<div id="header" style="background-color: #002347">
  
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" style="background-color: #002347">
  <ul >
    
    <h1 style="color:red; " >ONLINE GIFT SHOP</h1>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Home</span></a> </li>
     <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span style="color: white">Products<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul style="background-color: #002347">
        <li><a href="add_product.php">Add New</a></li>
        <li><a href="view_products.php">View All</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span style="color: white">Brands<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul style="background-color: #002347">
        <li><a href="add_brand.php">Add New</a></li>
        <li><a href="view_brands.php">View All</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span style="color: white">Categories<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul style="background-color: #002347">
        <li><a href="add_cat.php">Add New</a></li>
        <li><a href="view_categories.php">View All</a></li>
      </ul>
    </li>
    <li><a href="payments.php"><i class="icon icon-fullscreen"></i> <span style="color: white">View Payments</span></a></li>
    <li><a href="view_buyers.php"><i class="icon icon-fullscreen"></i> <span style="color: white">View Buyers</span></a></li>
    <li><a href="view_orders.php"><i class="icon icon-fullscreen"></i> <span style="color: white"> View Orders</span></a></li>
    <li><a href="messages.php"><i class="icon icon-fullscreen"></i> <span style="color: white">Messages</span></a></li>

    <li><a href="logout.php"><i class="icon icon-fullscreen"></i> <span style="color: red">Logout</span></a></li>
       
  </ul>
</div>


