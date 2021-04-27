<?php


// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}




include("connection.php");

if(isset($_GET['edit_cat'])){
	
	$cat_id = $_GET['edit_cat'];
  
	$add_cat = "select * from categories where cat_id =" . $cat_id;
  $result = $con->query($add_cat);
   print_r($result);
  die();
  $row = mysqli_fetch_array($result);
	}

if(isset($_GET['delete_cat'])){
  
  $cat_id = $_GET['delete_cat'];
  $delete_cat = "delete from  categories where cat_id = '$cat_id'";
  if ($con->query($delete_cat) === TRUE) {
            echo "<script>alert('Category Deleted Successfully')</script>";
    echo "<script>window.open('view_categories.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
  
  }


  if (isset($_POST['edit_cat'])){
      $category_name = $_POST['cat_name'];
      $category_id = $_POST['cat_id'];
      //$sql = "UPDATE categories SET cat_name = $category_name where cat_id='$category_id'";

      $sql = "UPDATE categories SET cat_name = '$category_name' WHERE cat_id = '$category_id' ";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Category updated Successfully')</script>";
    echo "<script>window.open('view_categories.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
          }

@include('header.php');

?>




<div id="content">
 <div class="container">
  <div class="row">
<div class="col-md-2">
  
</div>
<div class="col-md-8 panel" style="margin-top: 30px">

<!-- Form Name -->
<br><br>


<h2 style="margin-left:25px;">Add Product</h2>
<br>

<form class="form-horizontal" action="" method="POST">


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">CATEGORY NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="cat_name" value="<?php echo $row['cat_name'];  ?>" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">
  <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'];  ?>" class="form-control input-md">
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-5">
    <button id="singlebutton" name="edit_cat" class="btn btn-primary" style="float:right;">UPDATE CATEGORY</button>
  </div>
  
  </div>

</form>

</div>
</div>
</div>

<?php

@include('footer.php');

?>