<?php
@include('header.php');
?>


                    <div class="container">
                    <br/><br/>
            		<h2><b> ABOUT US:</b></h2>
                    <h3>About Online Gift Shop</h3>
                    
                    <p style="text-align:justify;">Online shopping is a form of electronic commerce which allows consumers to directly buy goods or services from a seller over the Internet using a web browser or a mobile app. Consumers find a product of interest by visiting the website of the retailer directly or by searching among alternative vendors using a shopping search engine, which displays the same product's availability and pricing at different e-retailers. As of 2020, customers can shop online using a range of different computers and devices, including desktop computers, laptops, tablet computers and smartphones.

An online shop evokes the physical analogy of buying products or services at a regular "bricks-and-mortar" retailer or shopping center; the process is called business-to-consumer (B2C) online shopping. When an online store is set up to enable businesses to buy from another businesses, the process is called business-to-business (B2B) online shopping. A typical online store enables the customer to browse the firm's range of products and services, view photos or images of the products, along with information about the product specifications, features and prices.

Online stores usually enable shoppers to use "search" features to find specific models, brands or items. Online customers must have access to the Internet and a valid method of payment in order to complete a transaction, such as a credit card, an Interac-enabled debit card, or a service such as PayPal. For physical products (e.g., paperback books or clothes), the e-tailer ships the products to the customer; for digital products, such as digital audio files of songs or software, the e-tailer usually sends the file to the customer over the Internet. The largest of these online retailing corporations are Alibaba, Amazon.com, and eBay.</p><br>


            
            	</div>


                <?php 


include("connection.php");
if(isset($_POST["message_submit"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $insert="insert into messages(name,email,message) values ('$name','$email', '$message')";

    if ($con->query($insert) === TRUE) {
     echo "<script>alert('Message Sent Successfully')</script>";
    echo "<script>window.open('contact.php','_self')</script>";
    
  } else {
      echo "Error: " . $insert . "<br>" . $con->error;
  }
}




?>


<div class="wrapper " style="background-color: white">
                <div class="content " style="background-color: white">
                    <div class="container a1 ">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-7 pannel" style="margin-top: 20px">
                           <h1>Message</h1>

                           <form action="" method="POST">
                            <input type="text" name="name" placeholder="Name" style="width:100%;height: 42px"><br><br>
                            <input type="text" name="email" placeholder="Example@gmail.com" style="width:100%;height: 42px"><br><br>
                            <input type="text" style="width:100%;height: 140px" name="message">
                                
                            <br><br>
                            <input type="submit" name="message_submit" style="color: black">
                            </form>

                        </div>
                    </div>

                </div>
                </div>
                

                </footer>
                <?php
                @include('footer.php');

                ?>