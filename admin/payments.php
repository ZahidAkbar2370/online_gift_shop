<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <h1  class="dropdown" id="profile-messages" >
    </h1>
    <h1 style="color:#F3ECED; ">Admin Pannel</h1>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Home</span></a> </li>
     <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>All Products<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="add_product.php">Add New</a></li>
        <li><a href="view_products.php">View All</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Brands<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="add_brand.php">Add New</a></li>
        <li><a href="view_brands.php">View All</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Categories<i class="fa fa-arrow-down" aria-hidden="true" style="float:right">&nbsp;&nbsp;</i></span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="add_category.php">Add New</a></li>
        <li><a href="view_categories.php">View All</a></li>
      </ul>
    </li>
    <li><a href="payments.php"><i class="icon icon-fullscreen"></i> <span>View Payments</span></a></li>
    <li><a href="view_buyers.php"><i class="icon icon-fullscreen"></i> <span>View Buyers</span></a></li>
    <li><a href="view_orders.php"><i class="icon icon-fullscreen"></i> <span>View Orders</span></a></li>
    <li><a href="logout.php"><i class="icon icon-fullscreen"></i> <span>Logout</span></a></li>
       
  </ul>
</div>

<!--sidebar-menu-->

<!--main-container-part-->




   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>Payments</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Payment No</th>
                  <th>Invoice No</th>
                  <th>Amount</th>
                  <th>Payment Mode</th>
                  <th>Payment Code</th>
                  <th>Payment Date</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX" align="center">
                  <td>1</td>
                  <td>2323</td>
                  <td>700$</td>
                  <td>Cash</td>
                  <td>0022112</td>
                  <td>23-02-2015</td>
                </tr>
                
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
<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Virtual University of Pakistan</div>
</div>

<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
