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
            <h4><b>All Brands</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Brand ID</th>
                  <th>Brand Name</th>
                  <th>UPDATE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
 
 <?php
	include("connection.php");
	
	$get_brands = "select * from brands";
	$exe_brands = mysqli_query($con, $get_brands);
	while($var_brands = mysqli_fetch_array($exe_brands)){
		$brand_id = $var_brands['brand_id'];
		$brand_name = $var_brands['brand_name'];

 ?>
              <tbody>
                <tr class="gradeX" align="center">
                  <td><?php echo $brand_id; ?></td>
                  <td><?php echo $brand_name; ?></td>
                  <td><a href="edit_brand.php?edit_brand=<?php echo $brand_id; ?>">Edit</td>
                  <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">X</td>
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

<?php

@include('footer.php');

?>