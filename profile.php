<?php 

@include('header.php');
include"connection.php";

// upset($_Session('Order'));

if (isset($_POST['update_profile'])){


      $buyer_id = $_POST['buyer_id'];
      $buyer_name = $_POST['buyer_name'];
      $buyer_email = $_POST['buyer_email'];
      $buyer_country = $_POST['buyer_country'];
      $buyer_city = $_POST['buyer_city'];
      $buyer_address = $_POST['buyer_address'];
      $buyer_phone = $_POST['buyer_phone'];
      $postal_code = $_POST['postal_code'];
      
      $sql = "UPDATE buyers SET buyer_name = '$buyer_name',buyer_email = '$buyer_email',buyer_country = '$buyer_country',buyer_city = '$buyer_city',buyer_address = '$buyer_address',buyer_phone = '$buyer_phone',postal_code = '$postal_code'WHERE buyer_id = '$buyer_id' ";
      
      if ($con->query($sql) === TRUE) {
            echo "<script>alert('Profile updated Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
      }

$user = $_SESSION['user'];
// print_r($user);
// die();
$get_buyer_id=$user['buyer_id'];

$sql_buyers = "select * from buyers where buyer_id='$get_buyer_id'";
$result_buy = mysqli_query($con, $sql_buyers);
$resultcat_count =  mysqli_num_rows($result_buy);




?>

              
                
                <div class="banner3">
                    <div class="container">
                        
                        <?php 
                         if (mysqli_num_rows($result_buy) > 0) {
                                while($row = mysqli_fetch_assoc($result_buy)) {
                                  // print_r($row);
                                  // die();
                                    ?> 
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-3">
                                      
                                    </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 products">
                          <h1>My Profile</h1>
                                <div class="well">
                                  <form class="form-horizontal" action="" method="POST">
                                    <input type="hidden" name="buyer_id" style="width: 100%" value="<?php echo $row['buyer_id'] ?>" >
                                  <label>Name</label><br>
                                  <input type="text" name="buyer_name" style="width: 100%" value="<?php echo $row['buyer_name'] ?>" ><br><br>

                                  <label>Email</label><br>
                                  <input type="email" name="buyer_email" value="<?php echo $row['buyer_email'] ?>"><br><br>

                                  <label>Country</label><br>
                                  <input type="text" name="buyer_country" value="<?php echo $row['buyer_country'] ?>"><br><br>

                                  <label>City</label><br>
                                  <input type="text" name="buyer_city" value="<?php echo $row['buyer_city'] ?>"><br><br>

                                  <label>Address</label><br>
                                  <input type="text" name="buyer_address" value="<?php echo $row['buyer_address'] ?>"><br><br>

                                  <label>Phone</label><br>
                                  <input type="number" name="buyer_phone" value="<?php echo $row['buyer_phone'] ?>"><br><br>

                                  <label>Postal Code</label><br>
                                  <input type="number" name="postal_code" value="<?php echo $row['postal_code'] ?>"><br><br>
                                   
                                  <input type="submit" name="update_profile" value="Update Profile" class="btn btn-secondary" style="color: black">
                                </form>
                                </div>

                            </div> 

                           <?php
                                }}
                           ?>
                           
                            
                            <!-- <p class="text-center hiplink"><a href="all_products.php">SHOW MORE</a></p>  -->        
                         </div>
                    </div></center>
               <!--  <div class="container-fluid fbaner">
                   
                    <div class="col-md-12">
                        <img src="images/3.png">
                    </div>
                </div> -->

                </footer>
                <style type="text/css">
                  .well input{
                    width: 100%;
                    height: 35px;
                  }
                </style>
  <?php
    @include ('footer.php');
  ?>