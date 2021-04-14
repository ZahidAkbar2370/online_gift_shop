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
            <h4><b>Order Detail</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order No</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                </tr>
              </thead>
  <?php
  include("connection.php");

  if(isset($_GET['view_order'])){
  
  $cat_id = $_GET['view_order'];
  $add_cat = "select * from order_detail where order_Id =" . $cat_id;
  $result = $con->query($add_cat);
 
  // $row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {

    $id = $row['Id'];
    $order_Id = $row['order_Id'];
    $pro_id = $row['pro_id'];
    $qty = $row['qty'];

  ?>

<?php

  $add_cat1 = "select * from products where pro_id =" . $pro_id;
  $result1 = $con->query($add_cat1);
 
  // $row1 = mysqli_fetch_array($result1);
 
while ($row1 = mysqli_fetch_array($result1)) {
  $pro_name=$row1['pro_name'];
?>
              <tbody>
                <tr class="gradeX" align="center">
                  
                  <td><?php echo $order_Id; ?></td>
                  <td><?php echo $pro_name; ?></td>
                  <td><?php echo $qty; ?></td>
                </tr>
<?php
}
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