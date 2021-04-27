<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}





include("connection.php");

if(isset($_POST['add_brand'])){
  
  $brand_name = $_POST['brand_name'];
  $add_brand = "insert into brands (brand_name) values ('$brand_name')";
  $exe_brand = mysqli_query($con, $add_brand);
  
  if($exe_brand){
    
    echo "<script>alert('Brand Added Successfully')</script>";
    echo "<script>window.open('add_brand.php','_self')</script>";
    
    }
  
  }


@include('header.php')

?>

<div id="content">


<!-- Form Name -->
<br><br>
<div class="container">
  
  <div class="row">
    <div class="col-md-2">
      
    </div>

    <div class="col-md-8 panel">
      <h2 style="margin-left:25px;">Add Brand</h2>
  <br>

  <form class="form-horizontal" action="" method="POST">



  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">BRAND NAME</label>  
    <div class="col-md-4">
    <input id="product_name" name="brand_name" placeholder="BRAND NAME" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  <!-- Button -->
  <div class="form-group">
    <div class="col-md-5">
      <button id="singlebutton" name="add_brand" class="btn btn-primary" style="float:right;">ADD BRAND</button>
      
    </div>
    </div>

  </form>
      </div>
    </div>

  </div>




</div>

<?php

@include('footer.php');

?>