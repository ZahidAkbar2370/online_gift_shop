<?php
session_start();

class orderlineitem {
    public $pro_id = 0;
    public $quantity = 0;
    public $price = 0;
    public $category = '';
    public $name = '';
    public function __construct($id, $qty,$price,$cat,$name) {
        $this->pro_id = $id;
        $this->quantity = $qty;
        $this->price = $price;
        $this->category = $cat;
        $this->name = $name;
        }
    
}

class paymentlineritem {
    public $pay_account_no = 0;
    public $pay_amount = 0;
    public $date = 0;
    public function __construct($account_no, $pay_amount,$date) {
        $this->pay_account_no = $account_no;
        $this->pay_amount = $pay_amount;
        $this->date = $date;
        }
    
}



?>

<!DOCTYPE html>
<html>
	<head>
    	<title>Auto Part</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="js/bootstrap.min.js">
        <link rel="stylesheet" href="icons/font/flaticon.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css" media="all">
        <link rel="stylesheet" href="css/detailpage.css">
        <link rel="stylesheet" href="css/cart.css">
        <link rel="stylesheet" href="css/allproducts.css">
        <link rel="stylesheet" href="css/loginregister.css">
        <link rel="stylesheet" href="css/checkout.css">

        <body>
                 
                 <nav class="navbar navbar-inverse">
  					<div class="container-fluid">
    					<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span> 
                            </button>
      						<a class="navbar-brand" href="index.php"><img src="images/logo3.png" alt="" style="margin-top: -40px;"></a>
    					</div>
    					<ul class="nav navbar-nav">
      						<li><a href="index.php">Home</a></li>
                            <li><a href="all_products.php">Poducts</a></li>
      						<li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <!-- <li><a href="my_account.php">My Account</a></li> -->
                            <!-- <li><a href="my_account.php">Login/Logout</a></li> -->
      						
    					</ul>
                        <div class="info">
                            <ul>
                            	<li><a href="#" style="color:#F9F5F6;"><?php
                    	
				if(!isset($_SESSION['user'])){
							
					echo "<a href='login.php'><b style='color:white;margin-right:10px'>Login</b></a>";
                    echo "<a href='register.php'><b style='color:white;margin-left:5px'>Register</b></a>";		
				}
				else{
								
					echo "<a href='profile.php'><i class='fa fa-user-o' style='margin-right:25px'></i></a>"  ;
                    echo "<a href='logout.php'><b style='color:white'>Logout</b></a>"	;			
					}
				?>  
                                </a></li>
                                <!-- <li><a href="profile.php"><i class="fa fa-user-o"></i></a></li> -->
                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i><sup> </sup><span>
                                    
                                    <?php
                                    if(isset($_SESSION['Order'])){

                                    $Order = $_SESSION['Order'];

                                    $totalamount = 0;
                                    foreach($Order as $orderlineitem)
                                    {
                                        $tPrice = $orderlineitem->price*$orderlineitem->quantity;

                                        $totalamount = $totalamount + $tPrice;
                                    }
                                    echo $totalamount . " Rs";
                                }else{
                                    echo "0 Rs";
                                }
                                    ?>
                                

                                </span></a>
                                </li>
							</ul>
	                    </div>
                   </div>  
				</nav>
</head>