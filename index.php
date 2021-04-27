<?php 

@include('header.php');
include"connection.php";


$sql = "SELECT products.* ,categories.cat_name FROM products, categories where products.cat_id = categories.cat_id";

$result = mysqli_query($con, $sql);
$result_count =  mysqli_num_rows($result);


$sql_categoreis = "select * from categories";
$result_cat = mysqli_query($con, $sql_categoreis);
$resultcat_count =  mysqli_num_rows($result_cat);

$sql_brand = "select * from brands";
$result_brand = mysqli_query($con, $sql_brand);
$resultbrand_count =  mysqli_num_rows($result_brand);



?>


                    <div class="banner3" >
                  <div class="container" style="margin-bottom: 20px">
                    <div class="row">
                      <div class="col-md-3 main-list" style="background-color: white;border-radius: 10px;margin-bottom: ">
                        <h1>Categories</h1>
                        <h5><?php echo $resultcat_count; ?> ITEMS</h5>
                      
                      <?php 
                         if (mysqli_num_rows($result_cat) > 0) {
                                while($rowcat = mysqli_fetch_assoc($result_cat)) {
                                    ?> 

                           <p><a href="all_products.php?category=<?php echo $rowcat["cat_id"]  ?>" >  <span style=" font-size:15px; cursor:pointer;"> <?php echo $rowcat["cat_name"]; ?>  </span> <a></p>
                          <?php
                                }}
                           ?>

                          <h1>Brands</h1>
                          <h5><?php echo $resultbrand_count; ?> ITEMS</h5>
                      
                       <?php 
                         if (mysqli_num_rows($result_brand) > 0) {
                                while($rowbrand = mysqli_fetch_assoc($result_brand)) {
                                    ?> 

                            <p><a href="all_products.php?category=<?php echo $rowbrand["brand_id"]  ?>" >  <span style=" font-size:15px; cursor:pointer;"> <?php echo $rowbrand["brand_name"]; ?>  </span> <a></p>
                          <?php
                                }}
                           ?>
                      </div>

                      <div class="col-md-9 ">
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
                           
                      </div>
                    </div>

                  </div>
                </div>
            

<h1 class="w3-center" ><b>Client Reviews</b></h1>



<style>
.mySlides {display:none;}
</style>


<div class="w3-content" style="width: 100%;margin-bottom: 20px;padding-top: 30px;padding-bottom: 15px">
  <div class="mySlides w3-container">
    <div class="row">
      <div class="col-md-6">
        <img src="images/client1.jpg" style="width:100%;height: 500px">
      </div>

      <div class="col-md-6">
        <h2><b>Scott Swanson, Product Manager</b></h2>
    <h3><i>The Pacific Grove Chamber of Commerce would like to thank eLab Communications and Mr. Will Elkadi for all the efforts and suggestions that assisted us in better positioning ourselves in the area of web, technology and training.</i></h3>
      </div>
      
    </div>
  </div>

  

  <div class="mySlides w3-container" style="width:100%">
    <div class="row">
      <div class="col-md-6">
        <img src="images/client2.jpg" style="width:100%;height: 500px">
      </div>

      <div class="col-md-6">
        <h2><b>Scott Swanson, Product Manager</b></h2>
    <h3><i>It's always a pleasure to work with Will and his team. They are personable, responsive, and results-oriented!</i></h3>
      </div>
      
    </div>
    
    
  </div>

</div>

<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); 
}
</script>











            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <img src="images/brands.jpg" alt="Los Angeles" width="100%" height="400px">
                </div>
              </div>
            </div>
            

                </footer>
  <?php
    @include ('footer.php');
  ?>