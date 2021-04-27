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




   <div id="content" style="background-color:">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
    <div class="widget-box panel" style="background-color: white">
          <div class="widget-title" style="background-color: white"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Messages</b></h4>
          </div>
          <div class="widget-content nopadding ">
            <table class="table table-bordered data-table " style="background-color: white">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>
                </tr>
              </thead>
    <?php
  include("connection.php");
  
  $get_cats = "select * from messages";
  $exe_cats = mysqli_query($con, $get_cats);
  while($var_cats = mysqli_fetch_array($exe_cats)){

    $id = $var_cats['id'];
    $name = $var_cats['name'];
    $email = $var_cats['email'];
    $message = $var_cats['message'];

 ?>
              <tbody>
                <tr class="gradeX" align="center">
                  <td><?php echo $id; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $message; ?></td>
                  
                </tr>
 <?php } ?>  
 
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