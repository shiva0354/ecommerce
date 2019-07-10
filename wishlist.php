<?php
session_start();
require 'includes/fetch.php';
$x = new fetchDatabase;
?>
<html>
<head>
	<title>www.Ecommerce Privacy.com</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<body>
<!--Header Section Start-->

<!--Signup/Login PopUp-->
<!-- sign popup box -->
<div class="sign-box">
   <div class="sign-content" style="border:solid 1px black;">
     <div class="close">+</div>
        <div class="tab-content-nav">
		   <ul class="nav-tabs nav">
		   <li class="nav-item"><a class="nav-link" href="#Login" data-toggle="tab">Log in</a></li>
		   <li class="nav-item"><a class="nav-link" href="#signup" data-toggle="tab">Sign Up</a></li>
	       </ul>
	    </div>
		
		   <div class="tab-content">
			  <div class="container tab-pane active" id="Login">
			  <form method="post" class="form-group">
			     <input type="text" class="form-control" name="mobile" placeholder="Mobile No." required />
			     <input type="password" class="form-control" name="password" placeholder="Email password" required />
			     <input type="submit" name="login" class="btn btn-danger" value="Log In">
			  </form>
			  <span class="xoborms">New to XoboRooms? please <a href="#">Login</a></span>
			  <p class="forget"><a href="#">Forget password?</a></p>
		   </div>
		     
		     <div class="container tab-pane fade" id="signup" >
			   <form method="post" class="form-group">
			      <input type="text" class="form-control" name="firstname"  placeholder="Firstname" required />
				  <input type="text" class="form-control" name="lastname"  placeholder="Lastname" required />
			      <input type="email" class="form-control" name="email" placeholder="Email Address" required />
			      <input type="number" class="form-control" name="mobileno"  placeholder="Mobile No." required />
			      <input type="text" class="form-control" name="password"  placeholder="Choose Your Password (at least 6 characters)" required />
			      <input type="checkbox" name="t_c" value="0" id="xobo-01">
			      <span class="policy">I am agree to Shopify<a href="#">T&C</a> and <a href="#">Privacy Policy.</a>
			      </span><br><br>
				  <span id="alrtMsg"></span>
			     <input type="submit" name="createAcc" value="Create Account and Send OTP" class="btn btn-danger">
			    </form>
			    <span class="xoborms">Already have an account <a href="#">Sign up</a></span>
		    </div> 
	       </div>
	    </div>
</div>
<!--Login Process-->
 <?php

 if(isset($_POST['login']))
{
			 $customermobile = $_POST['mobile'];
			 $customerpassword =$_POST['password'];
			 $fetchCustomer = "select * from customer where mobile='$customermobile' and password='$customerpassword'";
			 $init = mysqli_query($conn, $fetchCustomer);
			 $check = mysqli_num_rows($init);
			 
			 if($check > 0)
			 { 
		          $_SESSION['mobile'] = $customermobile;
				  echo "<script>alert('Logged In.')</script>";		
                  echo "<script>window.open('index.php','_self')</script>";				  
			 }
			 else
			 {
				 echo "<script>alert('We couldn\'t find you!pls sign up.')</script>";
				  echo "<script>window.open('index.php','_self')</script>";	
			 }
			 
 }
?>
<!--SignUp Process--->
<?php
 if(isset($_POST['createAcc']))
 { 
   if(isset($_POST['t_c']))
   {
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $email=$_POST['email'];
	 $phone=$_POST['mobileno'];
	 $password=$_POST['password'];
	  
	 $insert = "insert into customer(firstname,lastname,email,password,mobile) values('$firstname','$lastname','$email','$phone','$password')";
	 $init = mysqli_query($conn,$insert);
	 if($init)
	 {
		 echo "<script>alert('Shopify welcomes you!')</script>";
		 echo "<script>window.open('index.php','_self')</script>";
	 }
	 else
	 {
		  echo "<script>alert('Oop\'s something went wrong')</script>";
		  echo "<script>document.querySelector('.sign-box').style.display = 'flex';</script>";
	 }
   }
   else
   {
	     echo "<script>alert('Please,except Terms and Condition')</script>";
		  echo "<script>document.querySelector('.sign-box').style.display = 'flex';</script>";
   }
 }
?>
<!--End-->
			<!-- header section -->
			<div class="container-fluid top-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
								<div class="pull-left">
								<a class="headerlink" href="#">delights</a>
								<a class="headerlink" href="#">fanbook</a>
								<a class="headerlink" href="#">
									<i class="fas fa-mobile-alt"></i>
									download app
								</a>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="pull-right">
								<a class="headerlink" href="#">contact us </a>
								<a class="headerlink" href="#">track order</a>
								<a class="headerlink" href="#">pay online & get free shipping.</a>
							</div>
						</div>
					</div>
					</div>
				</div>

	<!-- //header section -->

		<!-- nav section -->
		
  <div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"></a>
     <?php include 'includes/menu.php' ;?>
   </div>
     <form class="form-inline" id="navigation">
    	      <a class="iconlink" href="#"><i class="fas fa-search">|</i></a>
			  <?php if(isset($_SESSION['mobile'])){?>
			  <div class="dropdown custom-dropdown">
			  <?php 
			    $uid = $_SESSION['mobile'];
                $customer = "select * from customer where mobile ='$uid' ";
				$init = mysqli_query($conn,$customer);
				$data = mysqli_fetch_array($init);
				$custmername = $data['firstname'];
				$custmeremail =$data['email'];
			  ?>
			  <i class="fas fa-user dropdown-toggle" data-toggle="dropdown"></i><?php echo $custmername ;?>
			  <div class="dropdown-menu">
			    <div class="dropdown-item"><a class="custom-dropdown-link" href="profile.php">My Account</a></div>
				<div class="dropdown-item"><a class="custom-dropdown-link"  href="logout.php">Logout</a></div>
			  </div>
			  </div>
			  <?php }else{ ?>
			  <i class="fas fa-user" id="login"></i>
			  <?php }?>
			  <!--Whislist Count-->
    	      <?php
			    @$mobile = $_SESSION['mobile'];
			    $w = $x->fetchTableByCategory('wishlist',$mobile,'uid');
              
			    $countWishList = mysqli_num_rows($w);
				if($countWishList > 0)
				{
			  ?>
			   <a href="wishlist.php"> <i  class="far fa-heart" id="icon-menu" style="color:#FFCE44"><?php echo $countWishList ;?></i></a>
				<?php } else {?>
				 <a href="#"><i class="far fa-heart" onclick="Checker()"><?php echo '' ;?></i></a>
				<?php }?>
				<!--Cart Count--->
				<?php
				   $c = $x->fetchTableByCategory('cart',$mobile,'uid');
				   $countCartList = mysqli_num_rows($c);
				   if($countCartList > 0)
				   {
				 ?>
    	      <a class="iconlink" href="cart.php?cart"><i class="fas fa-shopping-bag" style="color:#FFCE44;"><?php echo  $countCartList ;?></i></a>
		      <?php } else {?>
			    <a href="cart.php?cart"><i class="fas fa-shopping-bag"><?php echo '' ;?></i></a>
			  <?php } ?>
    	  </form>
</nav>
</div>
<script>
 function Checker()
 {
	 $.ajax({
		 url:"check-customer.php",
		 type:"post",
		 success:function(response){
			 if(response=="not loggedin")
								{
									alert("You must login first");
								    document.querySelector('.sign-box').style.display = 'flex';
								}
		 }
	 });
 }
</script>
<!-- //nav section -->
<!---Header Section End--->		
		<!-- wishlist section -->
		<div class="container-fluid" style="border-top: 1px solid #e7e7e7;">
			<div class="container" id="product-section">
			<h5 class="pageTitle">wishlist</h5>
	 <!--Whislist Product -->
	 <form action="" method="get">
      <div class="row">
          <?php
		      $table = $x->fetchTableByCategory('wishlist',$_SESSION['mobile'],'uid');
			  while($wishList = mysqli_fetch_array($table))
			  {
				 
				  $wishlistProduct =$wishList['product'];
				  $tablebycategory = $x->fetchTableByCategory('product',$wishlistProduct,'id');
				  while ($product = mysqli_fetch_array($tablebycategory))
				  {
					   $productid = $product['id'];
					   $productname =$product['product_name'];
					   $productcategory=$product['product_category'];
					   $productoption=$product['product_option'];
					   $productsuboption=$product['product_suboption'];
					   $productprice=$product['product_price'];
					   $productdesc=$product['product_desc'];
					   $productimage=$product['product_image'];
				 
			  
		 
               echo '       <div class="col-md-3 col-xs-6">
                              <div class="product-box">
                                 <a href="single.php?productId='.$productid.'"><img src="data:image/jpeg;base64,'.base64_encode($productimage).'" class="img-fluid" width="200" height="200"/></a>
                              <div class="circle-btn">
								 <a class="iconlink" href="#" onclick="deleteProduct('.$productid.');return false"><i class="fas fa-times" style="color: #7e7e7e;"></i></a>
                              </div>
                               <span class="product-Text">'.$productname.'</span>
                              </div>
                                <h3 class="Price">'.$productdesc.'</h3>
                              <div class="productPriceBox">
                               <span class="Price-text">₹ <b>'.$productprice.'</b></span>
                               <span class="actualPriceText">499</span>
                               <span class="discountPercentText">40% off</span>
                             </div>
						';
		  ?>
		  <script>
		      function deleteProduct(proId)
			  {
				 
				  $.ajax({
					  url:"includes/delete.php",
					  type:"POST",
                      data:{"delete-id":proId,"from":"wishlist"},
					  success:function()
					  {
						  $("#product-section").load("wishlist.php #product-section");
						  $("#icon-menu").load("wishlist.php #icon-menu");
					  }
				  });
			  }
		  </script>
		  <div class="AddToCartBtn">
                              <a 
							  href="#?productId=<?php echo $productid ;?>">
							  <button type="button" class="addToBag"  onclick="display(<?php echo $productid ;?>)" style="width: 100%;">MOVE TO BEG</button>
							  </a>
            </div>
			<script>
			 function display(id)
			 {
				 document.getElementById('selsize'+id).style.display="block";
			 }
			</script>
		   <div class="SelectSize">
                              <select id="selsize<?php echo $productid ;?>" name="size" class="drop-down text-center" style="border: 1px solid;display:none;" onchange="window.location = this.value; ">
                                   <option value="Select Size">Select Size:</option>
                                   <?php
		   
		                            $sizeTable = "select distinct size from size where product_id = '$productid'";
									$executeSizeTable = mysqli_query($conn , $sizeTable);
		                            while($size = mysqli_fetch_array($executeSizeTable))
		                            {
			                         $sizeId = $size['id'];
			                         $sizeName =$size['size'];
			                        ?>
                                   <option value="cart.php?size=<?php echo $sizeName ;?>&productId=<?php echo $productid;?>"><?php echo $sizeName ; ?></option>
									<?php } ?>
                              </select>
			</div>
			
			</div>
			<?php }}?>
			</form>
			<!--Whislist Product End---> 
        </div>
        </div>
		</div>
	<br>


		<!-- //wishlist section -->
			

		<!-- footer section -->
		<?php include 'includes/footer.php' ;?>

		<!-- //footer section -->
</body>
</html>



<?php
  if(isset($_GET['productId']))
  {
	  echo "<script>window.open('cart-data.php?productId=". $selectProductId."&size=".$selectProductSize."')</script>";
  } 
?>