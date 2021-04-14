<?php


// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}



include("connection.php");

if(isset($_GET['delete_brand'])){
	
	$delete_id = $_GET['delete_brand'];
	
	$delete_brand = "delete from brands where brand_id = '$delete_id'";	
	
	$exe_delete = mysqli_query($con, $delete_brand);
	
	if($exe_delete){
		
		echo "<script>alert('One Brand has been deleted!')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
		
		
		
		}
	
	
	}











?>