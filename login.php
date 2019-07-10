<?php require 'includes/connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>www.login.com</title>
	<meta name="viewport" content="width=device-width,initial-scale-1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 	<link href="https://fonts.googleapis.com/css?family=sans-serif" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css?v=1.0">
</head>
<body style="background: #eee;">
		<!-- login form -->
			<div class="loginBox">
				<h4 class="login">login | <a class="headerlink" href="signup.html">sign up</h4></a>
				<i class="fas fa-times" style="float: right; opacity: .5;"></i>
				<hr class="left"><br>
				<form class="log-in" method="POST">
					<div class="inputbox">
					
						<input type="text" name="customermobile" placeholder="Enter/Mobile No." required="">
					
						<br> <br>
						</div>
						<input type="submit" name="continue" value="continue" onclick="sendOTP()" class="btn btn-info">
						
				</form>
					
				<div class="connect-with">
					<hr class="cnt-with">
						<span class="socialHeading">Or Log in / Sign Up With</span>
					
					</div>
				
					
					<center>
					<a href="#"><button class="btn btn-primary"> Facebook</button></a>
					<a href="#"><button type="button" class="btn btn-danger">Google</button></a>
					</center>
					<div class="newuser  text-center">
						<span>
							New User?
							<span class="success">Sign Up></span>
						</span>
					 </div>
				</div>



		<!-- //login form -->
   <?php
		session_start();
		$x = new Database;
		$con = $x->getConnection();
		 if(isset($_POST['continue']))
		 {
			 $customermobile = $_POST['customermobile'];
			 $fetchCustomer = "select * from customer where mobile = '$customermobile'";
			 $init = mysqli_query($con , $fetchCustomer);
			 $check = mysqli_num_rows($init);
			 
			 if($check > 0)
			 { 
		          $_SESSION['mobile'] = $customermobile;
				  echo "<script>alert('Logged In.')</script>";
				  header("location:wishlist.php");
				   
			 }
			 else
			 {
				 echo "<script>alert('We couldn't find you!pls sign up.')</script>";
				 
			 }
			 
		 }
		?>
</body>
</html>