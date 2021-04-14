<?php

@include('header.php');

if(isset($_SESSION["user"]))
{
      echo "<script>window.open('index.php','_self')</script>";
      die();
}

include"connection.php";


if(isset($_POST['loginsubmit'])){
$user_login_query = "Select * from buyers where buyer_email = '" . $_POST['email'] . "' and  buyer_password = '" . $_POST['password'] . "'";

$user_result = $con->query($user_login_query);
$num_rows = mysqli_num_rows($user_result);

if($num_rows>0){
    $user = mysqli_fetch_array($user_result);
    $_SESSION["user"] = $user;
      echo "<script>window.open('index.php','_self')</script>";
}
else
{
    echo "Error: " . $user_result . "<br>" . $con->error;
}

}



if(isset($_POST['register'])){
		$b_name = $_POST['b_name'];
		$b_email = $_POST['b_email'];
		$b_pass = $_POST['b_pass'];
		$b_country = $_POST['b_country'];
		$b_city = $_POST['b_city'];
		$b_phone = $_POST['b_phone'];
		$b_address = $_POST['b_address'];
		$b_image = $_POST['b_image'];
		
		$add_buyer = "insert into buyers (buyer_name, buyer_email, buyer_password, buyer_country, buyer_city, buyer_address, buyer_phone, buyer_image) values ('$b_name', '$b_email', '$b_pass', '$b_country', '$b_city', '$b_address', '$b_phone', '$b_image')";
		
		$exe_buyer = mysqli_query($con, $add_buyer);
		if($exe_buyer){
		
		echo "<script>alert('Your Account Created Successfully!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		
			}
			}



?>


                <div class="wrapper">
                    <div class="container"><h1>MY ACCOUNT</h1></div>
                    <div class="container pannel">
                        <div class="col-md-6">
                            <h3>Login</h3>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="email">Email address <span>*</span></label>
                                        <input type="email"  name="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password <span>*</span></label>
                                        <input type="password" name="password" class="form-control" id="pwd">
                                    </div>
                                    <button type="submit" name="loginsubmit" class="btn btn-default">LOGIN</button>
                                  
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Register</h3>
                            <div class="content">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">Name <span>*</span></label>
                                        <input type="text" name="b_name" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address <span>*</span></label>
                                        <input type="email" name="b_email" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span>*</span></label>
                                        <input type="password" name="b_pass" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country <span>*</span></label>
                                        <input type="text" name="b_country" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City <span>*</span></label>
                                        <input type="text" name="b_city" class="form-control" id="pwd" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="add">Address <span>*</span></label>
                                        <input type="text" name="b_address" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Contact No <span>*</span></label>
                                        <input type="text" name="b_phone" class="form-control" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Photo<span>*</span></label>
                                        <input type="file" name="b_image" required="">
                                    </div>
                                    <button type="submit" name="register" class="btn btn-default">REGISTER</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


<?php 

@include('footer.php');

?>