<?php
@include('header.php');

include("connection.php");
if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login_register.php','_self')</script>";
      die();
}

if(isset($_POST['confirm_order']))
{
    // print_r($_SESSION['Order'][0]->pro_id);
    // die();
  $select_order_id="SELECT id FROM buyer_orders";
  $result = $con->query($select_order_id);

    // print_r($result->num_rows);
    // die();
  $get_order_id=($result->num_rows)+1;

  

    $account_no = $_POST['account_no'];
    $account_password = $_POST['account_password'];
    $pay_account = $_POST['pay_account'];
    $date = date("d m YY");

    $paymentlineritem = new paymentlineritem($account_no,$pay_account,$date);

        $Payement = array($paymentlineritem);    

        $_SESSION['Payement'] = $Payement;

    

    $insert="insert into payments(pay_id,amount,pay_date) values ('$get_order_id','$pay_account', '$date')";

    if ($con->query($insert) === TRUE) {
     echo "<script>alert('Payement Successfully')</script>";
    echo "<script>window.open('confirm.php','_self')</script>";
    
  } else {
      echo "Error: " . $insert . "<br>" . $con->error;
  }

        

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
                         <form action="" method="POST">
                          <h3>Payement</h3>

                            <input type="text" name="account_no" required="" placeholder="Enter Account #">

                            <input type="password" name="account_password" required="" placeholder="Password">

                            <input type="number" name="pay_account"  value="<?php echo  $totalamout;?>" >

                            <br><br>

                            <a href="cart.php"><button>Back to Edit</button></a>
                           <button name="confirm_order">Confirm Order</button>
                          </form>
                          
                          
                          
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