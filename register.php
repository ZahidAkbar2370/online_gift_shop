<?php

@include('header.php');

if(isset($_SESSION["user"]))
{
      echo "<script>window.open('index.php','_self')</script>";
      die();
}

include"connection.php";




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
                    <div class="container">
                        <div class="col-md-3">
                            
                        </div>
                       <div class="col-md-6 pannel" style="margin-top: 50px">
                            <h1>Register</h1>
                            <form action="" method="post">
                                    <div class="form-group">
                                        <!-- <label for="name">Name <span>*</span></label> -->
                                        <input type="text" name="b_name" class="form-control" id="email" placeholder="NAME" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="email">Email address <span>*</span></label> -->
                                        <input type="email" name="b_email" class="form-control" id="email" placeholder="Email address" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="password">Password <span>*</span></label> -->
                                        <input type="password" name="b_pass" class="form-control" id="email" placeholder="Password" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="country">Country <span>*</span></label> -->
                                        <input type="text" name="b_country" class="form-control" id="email" placeholder="Country" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="city">City <span>*</span></label> -->
                                        <input type="text" name="b_city" class="form-control" id="pwd" placeholder="City" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="add">Address <span>*</span></label> -->
                                        <input type="text" name="b_address" class="form-control" id="email" placeholder="Address" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="phone">Contact No <span>*</span></label> -->
                                        <input type="text" name="b_phone" class="form-control" id="email" placeholder="Contact No" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="image">Photo<span>*</span></label> -->
                                        <input type="file" name="b_image" placeholder="Photo" required="">
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