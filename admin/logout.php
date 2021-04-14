<?php

session_start();

if(isset($_SESSION["user"]))
{
	unset($_SESSION["user"]);
     
    echo "<script>window.open('login.php','_self')</script>";
      
}

?>