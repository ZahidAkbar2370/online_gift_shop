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
            <h4><b>All Products</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Product Categoey</th>
                  <th>Product Brand</th>
                  <th>Price</th>
                  <th>Picture</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php

  include("connection.php");
  
  $sql = "select products.*, categories.cat_name , brands.brand_name from products INNER JOIN categories ON categories.cat_id = products.cat_id INNER JOIN brands ON brands.brand_id=products.brand_id";
 $result = mysqli_query($con, $sql);
 // $categories = "SELECT * FROM categories WHERE categories . cat_id = products . cat_id";
 // $category = mysqli_query($con,  $categories);
 // $cat = mysqli_fetch_array($category);
 // $category_name = $cat['cat_name'];
 ?>

              <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_assoc($result)) {
                ?>
               <tr class='gradeX' align='center'>
                  <td><?php echo $row['pro_id'];  ?></td>
                  <td><?php echo $row['pro_name'];  ?></td>
                  <td><?php echo $row['cat_name'];  ?></td>
                  <td><?php echo $row['brand_name'];  ?></td>
                   <td><?php echo $row['pro_price'];  ?></td>
                  
                <td><img width="80" src="images/<?php echo $row['pro_image1'] ?>"></td>
                 <td> Active </td>
                 <td> 
                  <a href="edit_product.php?edit_product=<?php echo $row['pro_id']; ?>"> <i class="fa fa-edit"></i></a>
                  <a href="edit_product.php?delete_pro=<?php echo $row['pro_id'] ?>"><i class="fa fa-trash" style="margin-left: 20px"></i></a></td>
               </tr>
               <?php
             }
           }
                ?>
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