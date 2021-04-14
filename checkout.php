<?php

@include('header.php');


if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login_register.php','_self')</script>";
      die();
}



?>

                <div class="wrapper">
                    <div class="container"><h1>CHECKOUT</h1></div>
                    <div class="container pannel">
                        
                      
                        <div class="col-md-12 tod">
                            <h3>Your order</h3>
                            <table class="table table-bordered">
                                <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>T.Price</th>

                               
                              </tr>
                            <?php 
                              if(isset($_SESSION['Order']))
                              {
                                $Order = $_SESSION['Order'];
                                $totalamout = 0;
                                foreach($Order as $orderlineitem)
                                {

                            ?>

                            
                              <tr>
                                <td><?php echo $orderlineitem->name ?></b></td>
                                <td><?php echo $orderlineitem->quantity ?></td>
                                <td><?php echo $orderlineitem->price  ?></td>
                                <td><?php echo ($orderlineitem->price)*($orderlineitem->quantity)  ?></td>
                              </tr>
                           
                           
                           <?php
                                    $tPrice=$orderlineitem->price*$orderlineitem->quantity;
                            $totalamout = $totalamout + $tPrice;
                            }
                            }
                           ?>
                            <tr>
                             <td colspan="2"> <b>Total</b></td>
                             <td><b><?php echo $totalamout ?></b></td>
                             </tr>
                          </table>

                          <div>
                         
                          <a href="cart.php"><button>Back to Edit</button></a>
                           <a href="confirm.php"> <button>Confirm Order</button> </a>
                          </div>
                        </div>
                    </div>
                </div>

  <script>
                $(document).ready(function(){
                    $("#hide").hide();
                });
                $(document).ready(function(){
                    $("#sh").click(function(){
                        $("#hide").toggle(300);
                    });
                });
                $(document).ready(function(){
                    $("#hf").hide();
                });
                $(document).ready(function(){
                    $("#cmn-toggle-1").click(function(){
                        $("#hf").toggle(300);
                    });
                });
                $(document).ready(function(){
                    $("#lc").hide();
                });
                $(document).ready(function(){
                    $("#login").click(function(){
                        $("#lc").toggle(300);
                    });
                });
                $(document).ready(function(){
                    $("#ecc").hide();
                });
                $(document).ready(function(){
                    $("#cc").click(function(){
                        $("#ecc").toggle(300);
                    });
                });
                </script>


<?php

@include('footer.php');

?>