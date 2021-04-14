	<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}


include("connection.php");

if(isset($_POST['add_cat'])){
	
	$cat_name = $_POST['cat_name'];
	$add_cat = "insert into categories (cat_name) values ('$cat_name')";
	$exe_cat = mysqli_query($con, $add_cat);
	
	if($exe_cat){
		
		echo "<script>alert('Category Added Successfully')</script>";
		echo "<script>window.open('add_cat.php','_self')</script>";
		
		}
	
	}


@include('header.php');

?>

<div id="content">


<!-- Form Name -->
<br><br>


<h2 style="margin-left:25px;">Add Category</h2>
<br>
<form class="form-horizontal" action="" method="POST">



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">CATEGORY NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="cat_name" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text"/>
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-5">
    <button id="singlebutton" name="add_cat" class="btn btn-primary" style="float:right;">ADD CATEGORY</button>
  </div>
  
  </div>


</form>


</div>
</div>
</div>

<?php

@include('footer.php');

?>