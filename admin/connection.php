<?php
$servername="localhost";
$username="root";
$password="";
$dbname="online_gift_shop";

//create connection 
$con = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else{
	//echo "Connected successfully";
}
?>