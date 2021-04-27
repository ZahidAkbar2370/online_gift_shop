<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}

@include('header.php');

?>

<!--main-container-part-->




   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Buyers</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Buyer Name</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Phone No</th>
                  <th>Postal Code</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                <?php
  include("connection.php");
  
  $get_cats = "select * from buyers";
  $exe_cats = mysqli_query($con, $get_cats);
  while($var_cats = mysqli_fetch_array($exe_cats)){

    $buyer_id = $var_cats['buyer_id'];
    $buyer_name = $var_cats['buyer_name'];
    $buyer_email = $var_cats['buyer_email'];
    $buyer_country = $var_cats['buyer_country'];
    $buyer_city = $var_cats['buyer_city'];
    $buyer_address = $var_cats['buyer_address'];
    $buyer_phone = $var_cats['buyer_phone'];
    $postal_code = $var_cats['postal_code'];
    $buyer_image = $var_cats['buyer_image'];
 ?>
                <tr class="gradeX" align="center">
                  <td><?php echo $buyer_id; ?></td>
                  <td><?php echo $buyer_name; ?></td>
                  <td><?php echo $buyer_email; ?></td>
                  <td><?php echo $buyer_country; ?></td>
                  <td><?php echo $buyer_city; ?></td>
                  <td><?php echo $buyer_address; ?></td>
                  <td><?php echo $buyer_phone; ?></td>
                  <td><?php echo $postal_code; ?></td>
                  <td><img src="<?php echo $buyer_image; ?>"><?php echo $buyer_image; ?></td>
                  
                </tr>
       <?php } ?>  
              </tbody>
            </table>
          </div>
        </div>	
     </div>
   </div>
  </hr>
</div>
    
  
  </div>
</div>

    
 </div>   
<!--Footer-part-->
<?php

@include('footer.php');

?>