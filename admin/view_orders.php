<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}


@include('header.php');

?>


<!--main-container-part-->




   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Orders</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order No</th>
                  <th>Buyer Name</th>
                  <th>Price</th>
                  <th>Order Date</th>
                  <th>View Detail</th>
                  <!-- <th>Product ID</th>
                  <th>Quantity</th>
                  <th>Delivery Status</th> -->
                  <!-- <th>DELETE</th> -->
                </tr>
              </thead>
  <?php
  include("connection.php");
  
  $get_cats = "select * from buyer_orders";
  $exe_cats = mysqli_query($con, $get_cats);

  while($var_cats = mysqli_fetch_array($exe_cats)){

    $id = $var_cats['id'];
    $buyer_id = $var_cats['buyer_id'];
    $pro_price = $var_cats['pro_price'];
    $order_date = $var_cats['order_date'];

  ?>

  <?php

  $add_cat1 = "select * from buyers where buyer_id =" . $buyer_id;
  $result1 = $con->query($add_cat1);
 
  // $row1 = mysqli_fetch_array($result1);
 
while ($row1 = mysqli_fetch_array($result1)) {
  $buyer_name=$row1['buyer_name'];
?>
  

              <tbody>
                <tr class="gradeX" align="center">
                  <td><?php echo $id; ?></td>
                  <td><?php echo $buyer_name; ?></td>
                  <td><?php echo $pro_price; ?></td>
                  <td><?php echo $order_date; ?></td>
                  <td><a href="view_order_detail.php?view_order=<?php echo $id; ?>">Detail</td>
                  <!-- <td>02343</td>
                  <td>02</td>
                  <th>Pending</th> -->
                  <!-- <td><a href="#">X</td> -->
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