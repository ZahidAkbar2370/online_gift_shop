<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}



include("connection.php");

$sql = "SELECT brand_name, brand_id FROM brands";
$categories = "SELECT cat_id, cat_name FROM categories";
$result = $con->query($sql);
$category = $con->query($categories);


if(isset($_POST['add_product'])){
  
  $name = $_POST['name'];
  $price = $_POST['price'];
  $product_category = $_POST['category'];
  $brand = $_POST['brand'];
  $description = $_POST['desc'];
  // $image1 = $_POST['image1'];
  // $image2 = $_POST['image2'];

//image names
$image1 = $_FILES['image1']['name'];
// $image2 = $_FILES['image2']['name'];


//image temp names
$temp_name1 = $_FILES['image1']['tmp_name'];
// $temp_name2 = $_FILES['image2']['tmp_name'];


if($name=='' || $price=='' || $product_category=='' || $brand=='' || $description=='') {
	
	
	echo "<script>alert('Please fill all the fields!')</script>";
	  exit();
	  
}

	
	else{
		
	//uploading images to its folder
	move_uploaded_file($temp_name1, "images/$image1");
	// move_uploaded_file($temp_name2, "images/$image2");



   $add_product_query = "insert into products (pro_name, pro_price, cat_id, brand_id, pro_des, pro_image1, pro_image2) values ('$name','$price', $product_category, $brand,'$description','$image1','')";
// print_r($add_product_query);
// die();
  if ($con->query($add_product_query) === TRUE) {
     echo "<script>alert('Product Added Successfully')</script>";
    echo "<script>window.open('add_product.php','_self')</script>";
    
  } else {
      echo "Error: " . $add_product_query . "<br>" . $con->error;
  }
}

  
  }
@include('header.php');


?>


<div id="content">


<!-- Form Name -->
<br><br>


<h2 style="margin-left:25px;">Add Product</h2>
<br>

        	<form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT PRICE</label>  
  <div class="col-md-4">
  <input id="product_name" name="price" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text">
    
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <?php

    echo "<select id='product_categorie' name='category' class='form-control'>";

      if (mysqli_num_rows($category) > 0) {
      while($row = mysqli_fetch_assoc($category)) {
    echo   "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
    }
  }
   echo "</select>";
    ?>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT BRAND</label>
  <div class="col-md-4">
     <?php

    echo "<select id='product_categorie' name='brand' class='form-control'>";

      if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
    echo   "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
    }
  }
   echo "</select>";
    ?>
  </div>
</div>

<!-- Text input-->


<!-- Text input-->


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
    <textarea id="product_name" name="desc" class="form-control input-md" required cols="8" rows="9"></textarea>
  </div>
</div>

 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PRODUCT MAIN IMAGE</label>
  <div class="col-md-4">
    <input id="filebutton" name="image1" class="input-file" type="file">
  </div>
</div>

<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">AUXILIARY IMAGE</label>
  <div class="col-md-4">
    <input id="filebutton" name="image2" class="input-file" type="file">
  </div>
</div> -->

<!-- Button -->
<div class="form-group">
  <div class="col-md-5">
    <button id="singlebutton" name="add_product" class="btn btn-primary" style="float:right;">ADD PRODUCT</button>
   
  </div>
  </div>

</form>


</div>
</div>
</div>

<?php

@include('footer.php');

?>