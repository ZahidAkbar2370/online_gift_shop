<?php

@include('header.php');

include("connection.php");

$categories = "select * from categories";
$result_category = $con->query($categories);

$brands = "SELECT * FROM brands";
$result_brand = $con->query($brands);

if(isset($_GET['category'])){
    
    $category_id = $_GET['category'];
    
    $all_category_product = "select products.*, categories.cat_name, brands.brand_name from products, categories,brands  WHERE products.cat_id = categories.cat_id and products.brand_id = brands.brand_id and products.cat_id = $category_id";
    $result_product = $con->query($all_category_product);
    $result_count = mysqli_num_rows($result_product);
    
    }
else if(isset($_GET['brand']))
{
    $brand_id = $_GET['brand'];
    $all_brand_product = "select products.*, categories.cat_name, brands.brand_name from products, categories,brands  WHERE products.cat_id = categories.cat_id and  products.brand_id = brands.brand_id  and products.brand_id = $brand_id";
    $result_product = $con->query($all_brand_product);
     $result_count = mysqli_num_rows($result_product);
}
else
{
      $products = "select products.*, categories.cat_name , brands.brand_name from products, categories, brands where categories.cat_id = products.cat_id and  products.brand_id = brands.brand_id";
        $result_product = $con->query($products);
         $result_count = mysqli_num_rows($result_product);

}

?>

                <div class="banner3">
                    <div class="container">
                    	<div class="col-md-3">
                    		<div class="main-list">
                    			<h3>Shop By</h3>
                    			<hr>
                    			<h4>Shopping Options</h4>
                                <p><a href="all_products.php">All Products</a></p><hr>
                    			<h5>Categories</h5>
                                <?php
                    			if (mysqli_num_rows($result_category) > 0) {
                                while($row_category = mysqli_fetch_assoc($result_category)) {
                                    ?>
                                <p><a href="all_products.php?category=<?php echo $row_category['cat_id']; ?>"><?php echo $row_category['cat_name']; ?></a></p><hr>
                                <?php 
                            }
                                }
                                ?>
                                <h5>Brands</h5>
                                <?php
                                if (mysqli_num_rows($result_brand) > 0) {
                                while($row_brand = mysqli_fetch_assoc($result_brand)) {
                                    ?>
                    			<p><a href="all_products.php?brand=<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name'];  ?></a></p><hr>
                                <?php 
                            }
                        }
                                ?>
                    		</div>
                    	</div>
                    	<div class="col-md-9">
                    		<div class=" col-md-12 sorter">
                    			<div class="col-md-7">
                                    <?php if($result_count> 0) { ?>
                    				<label class="amount">Items 1- <?php echo $result_count ?></label>
                                    <?php
                                        }
                                        else{ ?>
                                    <label class="amount">No Items Found</label>
                                        <?php
                                        }
                                    ?>
                    			</div>
                    			
                    		</div>

                            <?php
                            if (mysqli_num_rows($result_product) > 0) {
                                while($row_product = mysqli_fetch_assoc($result_product)) {

                            ?>
	                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 products">
	                        	<div class="well">
	                            	<a href="details.php?product_detail=<?php echo $row_product['pro_id']; ?>"><img class="img-responsive" src="images/products/gift.jpg" alt="propeller"></a>
	                                <h4><?php echo $row_product['pro_name']; ?></h4>
                                    <p style="color:grey"><?php echo $row_product['brand_name']; ?></p>
	                                <p><?php echo $row_product['cat_name']; ?><span class="price"><?php echo $row_product['pro_price']; ?></span></p>
	                        	</div>
	                        </div> 
                            <?php 
                        }
                        }
                            ?>

                   <!--          <div class="col-md-12 paginate-b">
	                            <div class="paginate">
								    <ul>
								        <li class="prev"><a href="#">Previous</a></li>
								        <li><a href="#">1</a></li>
								        <li><a href="#" class="inactive">2</a></li>
								        <li><a href="#">3</a></li>
								        <li><a href="#" class="active">4</a></li>
								        <li><a href="#">5</a></li>
								        <li><a href="#" class="more">&hellip;</a></li>
								        <li><a href="#">9</a></li>
								        <li><a href="#">10</a></li>
								        <li><a href="#">11</a></li>
								        <li class="next"><a href="#">Next</a></li>
								    </ul>
								</div>
							</div> -->        
                        </div>
                    </div>
                </div>



<?php

@include('footer.php');


?>