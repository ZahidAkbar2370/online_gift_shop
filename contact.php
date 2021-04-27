<?php 
@include('header.php');


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
                    <div class="container a1 well">
                        
                        <div class="col-md-6 contacts">
                            <h1>Contact</h1>
                            <div class="col-md-6 iae">
                                <h4>Information</h4>
                                <p>Hi, I m Ayesha. I m Selling Gifts.</p>
                                <br>
                                <h4>Adress</h4>
                                <p>Path Pur,Layyah</p>
                                <br>
                                <h4>Email</h4>
                                <p><a href="#">ayeshaashraff298@gmail.com</a></p>
                            </div>
                            <div class="col-md-6 fbh">
                                <h4>Phone</h4>
                                <p>+923462260836</p>
                            </div>
                          
                        </div>

                        
                        <div class="col-md-6 pannel" style="margin-top: 20px">
                           <h1>Message</h1>

                           <form action="" method="POST">
                            <input type="text" name="name" placeholder="Name" style="width:100%"><br><br>
                            <input type="text" name="email" placeholder="Example@gmail.com" style="width:100%"><br><br>
                            <input type="text" style="width:100%;height: 140px" name="message">
                                
                            <br><br>
                            <input type="submit" name="message_submit">
                            </form>

                        </div>
                    </div>

                </div>
                </div>

    <?php
    @include('footer.php');
    ?>
                