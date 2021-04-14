<?php


// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}




include("connection.php");

$categories = "SELECT * FROM categories";
$result_cat = $con->query($categories);

$brands = "SELECT * FROM brands";
$result_brand = $con->query($brands);

if(isset($_GET['edit_product'])){
    $pro_id = $_GET['edit_product'];
    $edit_product = "select * from products where pro_id =" . $pro_id;
    $result = $con->query($edit_product);
    $row = mysqli_fetch_array($result);
  }

  if(isset($_GET['delete_pro'])){
  
  $pro_id = $_GET['delete_pro'];
  $delete_pro = "delete from products where pro_id = '$pro_id'";
  if ($con->query($delete_pro) === TRUE) {
            echo "<script>alert('Product Deleted Successfully')</script>";
    echo "<script>window.open('view_products.php','_self')</script>";
        } else {
            echo "Error updating record: " . $con->error;
        }
  
  }


  if(isset($_POST['edit_product'])){
  
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $brand = $_POST['brand'];
  $description = $_POST['desc'];
  // $image1 = $_POST['image1'];
  // $image2 = $_POST['image2'];

   $update_product_query = "UPDATE products SET pro_name = '$name', pro_price = '$price', cat_id = $category, brand_id = $brand, pro_des = '$description'  WHERE pro_id = $pro_id ";
   

  //saving image to directory
  // $uploaddir = '../images/products/';
  // $uploadfile = $uploaddir . basename($_FILES['image1']['name']);

  // if (move_uploaded_file($_FILES['image1']['tmp_name'], $uploadfile)) {
  // echo "File is valid, and was successfully uploaded.";
  // } else {
  //  echo "Upload failed";
  //  die();
  // }

  
  if ($con->query($update_product_query) === TRUE) {
     echo "<script>alert('Product Updated Successfully')</script>";
    echo "<script>window.open('view_products.php','_self')</script>";
    
  } else {
      echo "Error: " . $update_product_query . "<br>" . $con->error;
  }

  
  }


@include('header.php');

?>


<div id="content">


<!-- Form Name -->
<br><br>


<h2 style="margin-left:25px;">Edit Product</h2>
<br>



        	<form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data" >
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="name" value="<?php echo $row['pro_name']; ?>" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT PRICE</label>  
  <div class="col-md-4">
  <input id="product_name" name="price" value="<?php echo $row['pro_price']; ?>" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
    <textarea name="desc" class="form-control input-md" required="" cols="8" rows="9"><?php echo $row['pro_des']; ?></textarea>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <?php

    echo "<select id='product_categorie' name='category' class='form-control'>";

      if (mysqli_num_rows($result_cat) > 0) {
      while($row_cat = mysqli_fetch_assoc($result_cat)) {
    echo   "<option value=" . $row_cat['cat_id'] . " " . ($row_cat['cat_id'] == $row['cat_id'] ? "selected" : "" ) . ">" . $row_cat['cat_name'] . "</option>";
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

     if (mysqli_num_rows($result_brand) > 0) {
      while($row_brand = mysqli_fetch_assoc($result_brand)) {
    echo   "<option value=" . $row_brand['brand_id'] . " " .  ($row_brand['brand_id'] == $row['brand_id'] ? "selected":""  ). ">" . $row_brand['brand_name'] . "</option>";
    }
  }
   echo "</select>";
    ?>
  </div>
</div>

<!-- Text input-->


<!-- Text input-->


<!-- Textarea -->


 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PRODUCT MAIN IMAGE</label>
  <div class="col-md-4">
    <input id="filebutton" name="image1" class="input-file" type="file">
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">AUXILIARY IMAGE</label>
  <div class="col-md-4">
    <input id="filebutton" name="image2" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-5">
    <button id="singlebutton" name="edit_product" class="btn btn-primary" style="float:right;">EDIT PRODUCT</button>
  
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

</div>
</div>
</div>

<?php

@include('footer.php');

?>