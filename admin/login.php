
<?php

// Start the session
session_start();

if(isset($_SESSION["user"]))
{
      echo "<script>window.open('index.php','_self')</script>";
      die();
}


$error = "";

if(isset($_POST['loginsubmit'])){

if($_POST['email'] == 'admin@gmail.com' && $_POST['password'] = '123$$'){
      $_SESSION["user"] = 'admin@gmail.com';
      echo "<script>window.open('index.php','_self')</script>";
}
else
{
    $error= "Invalid Login Detais";
}

}
?>

<html>
<head>
<title>Admin</title>
<meta charset="UTF-8" />

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

</head>

<body>
<div class="container">
    <div class="row">
		<div class="span12">
			<form class="form-horizontal" action="" method="POST">
			  <fieldset>
			    <div id="legend" style="margin-top:50px;">
			      <legend class="">Admin Login</legend>
			    </div>
			    <div class="control-group">
			      <!-- Username -->
			      <label class="control-label"  for="username">Email</label>
			      <div class="controls">
			        <input type="text" name="email" placeholder="Enter your email" class="input-xlarge" style="border-radius:1px; width:250px;">
			      </div>
			    </div>
			    <div class="control-group">
			      <!-- Password-->
			      <label class="control-label" for="password">Password</label>
			      <div class="controls">
			        <input type="password" name="password" placeholder="Enter your password" class="input-xlarge" style="border-radius:1px; width:250px;">
			      </div>
			    </div>
			    <div class="control-group">
			      <!-- Button -->
			      <div class="controls">
                  <input class="btn btn-success" type="submit" name="loginsubmit" value="Login">
			      </div>
			    </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>


<span> <?php echo $error; ?>

</body>
</html>