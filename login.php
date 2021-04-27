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
     echo "<script>alert('Invalid Something')</script>";
     echo "<script>window.open('login.php','_self')</script>";
}

}





?>


                <div class="wrapper">
                    <div class="container"></div>
                    <div class="container">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-6 pannel" style="margin-top: 50px">
                            <h1>Login</h1>
                            <form method="post" action="">
                                    <div class="form-group">
                                        <!-- <label for="email">Email address <span>*</span></label> -->
                                        <input type="email"  name="email" class="form-control" id="email" placeholder="Email address" required="">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="pwd">Password <span>*</span></label> -->
                                        <input type="password" placeholder="Password" name="password" class="form-control" id="pwd" required="">
                                    </div>
                                    <button type="submit" name="loginsubmit" class="btn btn-success">LOGIN</button>
                                  
                                </form>
                        </div>
                       
                    </div>
                </div>


<?php 

@include('footer.php');

?>