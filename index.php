<?php 

@include('header.php');
include"connection.php";

// upset($_Session('Order'));

$sql = "SELECT products.* ,categories.cat_name FROM products, categories where products.cat_id = categories.cat_id";

$result = mysqli_query($con, $sql);
$result_count =  mysqli_num_rows($result);


$sql_categoreis = "select * from categories";
$result_cat = mysqli_query($con, $sql_categoreis);
$resultcat_count =  mysqli_num_rows($result_cat);




?>

               <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                       
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <img src="images/Banner.jpg" alt="Los Angeles" width="100%">
                        </div>

                        <div class="item">
                          <img src="images/banner.jpg" alt="Chicago" width="100%">
                        </div>

                       
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div> 
            
            
            	<div class="banner3">
                	<div class="container">
                       <h1>Categories</h1>
                        <h5><?php echo $resultcat_count; ?> ITEMS</h5>
                      

                        <?php 
                         if (mysqli_num_rows($result_cat) > 0) {
                                while($rowcat = mysqli_fetch_assoc($result_cat)) {
                                    ?> 

                            <a href="all_products.php?category=<?php echo $rowcat["cat_id"]  ?>" >  <span style=" padding-right: 40px; font-size:20px; cursor:pointer;"> <?php echo $rowcat["cat_name"]; ?>  </span> <a>
                          <?php
                                }}
                           ?>
                	</div>
                
                <div class="banner3">
                    <div class="container">
                        <h1>PRODUCTS</h1>
                        <h5><?php echo $result_count; ?> ITEMS</h5>

                        <?php 
                         if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 products">
                                <div class="well">
                                    <a href="details.php?product_detail=<?php echo $row['pro_id']; ?>"><img class="img-responsive" src="admin/images/<?php echo $row['pro_image1'] ?>" alt="img" style="width: 200px;height:150px;"></a>
                                    <h4><?php echo $row['pro_name'] ?></h4>
                                    <p><?php echo $row['cat_name'] ?><span class="price"><?php echo $row['pro_price'] ?></span></p>
                                </div>
                            </div> 
                           <?php
                                }}
                           ?>
                           
                            
                            <!-- <p class="text-center hiplink"><a href="all_products.php">SHOW MORE</a></p>  -->        
                         </div>
                    </div>
                </div>
               <!--  <div class="container-fluid fbaner">
                   
                    <div class="col-md-12">
                        <img src="images/3.png">
                    </div>
                </div> -->

                </footer>
  <?php
    @include ('footer.php');
  ?>