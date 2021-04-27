<?php



@include('header.php');

include("connection.php");

if(isset($_POST['quantity'])){

// echo "<pre>";
//     print_r($_SESSION['Order']);
//     echo "</pre>";
//     die();

    if(!isset($_SESSION['Order'])){
        

    //   

        $sql_product = "select products.*, categories.cat_name from products,categories where products.cat_id = categories.cat_id and pro_id = " . $_POST['pro_id'] ;

        $result_product = $con->query($sql_product);

        $row_product_detail = mysqli_fetch_array($result_product);

        $orderlineitem = new orderlineitem($row_product_detail['pro_id'],$_POST['quantity'], $row_product_detail['pro_price'], $row_product_detail['cat_name'], $row_product_detail['pro_name']);

        $Order = array($orderlineitem);    

        $_SESSION['Order'] = $Order;
    }
    else{


         $sql_product = "select products.*, categories.cat_name from products,categories where products.cat_id = categories.cat_id and pro_id = " . $_POST['pro_id'] ;

        $result_product = $con->query($sql_product);

        $row_product_detail = mysqli_fetch_array($result_product);

        $orderlineitem = new orderlineitem($row_product_detail['pro_id'],$_POST['quantity'], $row_product_detail['pro_price'], $row_product_detail['cat_name'], $row_product_detail['pro_name']);

        $Order =  $_SESSION['Order'];
        array_push($Order,$orderlineitem);

        $_SESSION['Order'] = $Order;

    }


}


?>

                <div class="cart">
                    <div class="container">
                        <h1>Cart</h1>
                        <p class="p1">1 ITEM</p>

                        <?php if(isset($_SESSION['Order'])){
                            
                            $Order = $_SESSION['Order'];
                            if(!empty($Order))
                            {
                            foreach($Order as $orderlineitem)
                            {
                                ?>

                                   <div class="bg">
                            <div class="col-md-3 img">
                                <img class="img-responsive" style="height:200px;" src="admin/images/products/gift.jpg">
                            </div>
                            <div class="col-md-3 hd walls">
                                <h6><?php echo $orderlineitem->category ?></h6>
                                <h4><?php echo $orderlineitem->name ?></h4>
                            </div>
                            <div class="col-md-6 pt">
                                <table class="ptable">
                                    <tr>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $orderlineitem->price ?></td>
                                        <td>
                                            <form id='myform' method='POST' action='#'>
                                                <input type='button' value='-' class='qtyminus' field='quantity' />
                                                <input type='text' name='quantity' value='<?php echo $orderlineitem->quantity ?>' class='qty' />
                                                <input type='button' value='+' class='qtyplus' field='quantity' />
                                            </form>
                                        </td>
                                        <td> <?php echo $orderlineitem->quantity * $orderlineitem->price ?>  </td>
                                    </tr>
                                </table>
                            </div>
                           
                            <div class="col-md-4 rfc">
                                <h4>
                                <!-- <a href="#">REMOVE FROM CART</a> -->
                                </h4>
                            </div>
                        </div>
                         <br><br>
                         <?php
                         }
                     }
                         }
                         ?>   

                        <div style="margin-bottom: 50px;" > <a href="checkout.php"><button>Continue to Checkout</button> </a>
                        <br><br> <span><b> Note : </b> You must have to register or login to process the order 
                        </span>
                        </div>

                     


                    </div>
                </div>


                <script type="text/javascript">
                    jQuery(document).ready(function(){
                    // This button will increment the value
                    $('.qtyplus').click(function(e){
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        fieldName = $(this).attr('field');
                        // Get its current value
                        var currentVal = parseInt($('input[name='+fieldName+']').val());
                        // If is not undefined
                        if (!isNaN(currentVal)) {
                            // Increment
                            $('input[name='+fieldName+']').val(currentVal + 1);
                        } else {
                            // Otherwise put a 0 there
                            $('input[name='+fieldName+']').val(0);
                        }
                    });
                    // This button will decrement the value till 0
                    $(".qtyminus").click(function(e) {
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        fieldName = $(this).attr('field');
                        // Get its current value
                        var currentVal = parseInt($('input[name='+fieldName+']').val());
                        // If it isn't undefined or its greater than 0
                        if (!isNaN(currentVal) && currentVal > 0) {
                            // Decrement one
                            $('input[name='+fieldName+']').val(currentVal - 1);
                        } else {
                            // Otherwise put a 0 there
                            $('input[name='+fieldName+']').val(0);
                        }
                    });
                });

                $(document).ready(function(){
                    $("#it").hide();
                });
                $(document).ready(function(){
                    $("#hi").click(function(){
                        $("#it").fadeToggle(500);
                    });
                });
                </script>

<?php

@include('footer.php');

?>

             