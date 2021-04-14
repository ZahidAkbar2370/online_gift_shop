<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}

@include('header.php')


?>


<!--main-container-part-->




   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Categories</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
              </thead>
    <?php
	include("connection.php");
	
	$get_cats = "select * from categories";
	$exe_cats = mysqli_query($con, $get_cats);
	while($var_cats = mysqli_fetch_array($exe_cats)){
		$cat_id = $var_cats['cat_id'];
		$cat_name = $var_cats['cat_name'];

 ?>
              <tbody>
                <tr class="gradeX" align="center">
                  <td><?php echo $cat_id; ?></td>
                  <td><?php echo $cat_name; ?></td>
                  <td><a href="edit_cat.php?edit_cat=<?php echo $cat_id; ?>">Edit</td>
                  <td><a href="edit_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</td>
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