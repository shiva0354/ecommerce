<?php
session_start();
include_once './includes/connection.php';
$database = new Database;
$connection = $database->getConnection();

include_once './includes/fetch.php';
$fetchObject=new fetchDatabase;

?>
<!DOCTYPE html>
<html>
<head>
<title>XOBOROOMS ADMIN</title>
<!---Bootrap Css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!--Custom Css-->
<style>
 .my-input
 {
	 border-radius:0;
 }
 .my-input-btn
 {
	 border-radius:0;
	 background-color:#1FA363;
	 color:white;
	 font-weight:bold;
 }
 #particles-js
 {
	 background-color:#1FA363;
 }
</style>
</head>
<body>
<div class="container">
<br><br><br>
   <div class="row">
      <div class="col-sm-4"></div>
	  <div class="col-sm-4">
	     <h3>Login</h3>
		 <br><br>
	      <form action="" class="form-group" method="post">
		     <input type="text" class="form-control my-input" name="email" placeholder="Email" autocomplete="off"><br>
			 <input type="password" class="form-control my-input" name="password" placeholder="Password"><br>
			 <input type="submit" value="Login" class="form-control my-input-btn">
		  </form>
	  
	  </div>
	  <div class="col-sm-4"></div>
   </div>
   
</div>

</body>
<!--Custom Scripts--->
<script src="js/admin.js"></script>
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<!--Bootstrap Scripts--->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
	  $email = mysqli_real_escape_string($connection,$_POST['email']);
	  $password =mysqli_real_escape_string($connection,$_POST['password']);
	  
	  $select  = $fetchObject->fetchTableByColumnAttrs('admin',$connection,'email','password',$email,$password);
	  $check = mysqli_num_rows($select);
	  if($check > 0)
	  {
		  $_SESSION['email'] = $email;
		  echo "<script>alert('welcome to Admin')</script>";
		  echo "<script>window.open('index.php','_self')</script>";
	  }
	  else
	  {
		  echo "<script>alert('Your Credential Are Wrong')</script>";
		  echo "<script>window.open('login.php','_self')</script>";
	  }
	  
  }
?>