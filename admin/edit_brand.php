<?php


// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}




include("connection.php");

if(isset($_GET['edit_brand'])){
  
  $brand_id = $_GET['edit_brand'];
  $add_brand = "select * from brands where brand_id =" . $brand_id;
  $result = $con->query($add_brand);
  $row = mysqli_fetch_array($result);
  }

if(isset($_GET['delete_brand'])){
  
  $brand_id = $_GET['delete_brand'];
  $delete_brand = "delete from brands where brand_id = '$brand_id'";
  if ($con->query($delete_brand) === TRUE) {
            echo "<script>alert('Brand Deleted Successfully')</script>";
    echo "<script>window.open('view_brands.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
  
  }


  if (isset($_POST['update_brand'])){
      $brand_name = $_POST['brand_name'];
      $brand_id = $_POST['brand_id'];
      //$sql = "UPDATE categories SET cat_name = $category_name where cat_id='$category_id'";

      $sql = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = '$brand_id' ";
      //UPDATE brands SET brand_name = 'Audi' WHERE brand_id = '1' 
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Brand updated Successfully')</script>";
    echo "<script>window.open('view_brands.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
          }


@include('header.php')

?>

<div id="content">
 <div class="container">
  <div class="row">
<div class="col-md-2">
  
</div>
<div class="col-md-8 panel" style="margin-top: 30px">

<!-- Form Name -->
<br><br>


<h2 style="margin-left:25px;">Add Brand</h2>
<br>


<form class="form-horizontal" action="" method="POST">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">BRAND NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="brand_name" value="<?php echo $row['brand_name'];  ?>" placeholder="BRAND NAME" class="form-control input-md" required="" type="text">
  <input type="hidden" name="brand_id" value="<?php echo $row['brand_id'];  ?>" class="form-control input-md">
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-5">
    <button id="singlebutton" name="update_brand" class="btn btn-primary" style="float:right;" value="Edit Brand" >EDIT BRAND</button>
  
  </div>
  </div>

</fieldset>
</form>

</div>
</div>
</div>

<?php

@include('footer.php');

?>