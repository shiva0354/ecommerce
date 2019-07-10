<?php
   session_start();
   require 'includes/fetch.php';
   $x = new fetchDatabase;
   $product_id_from_product_thumbnail=$_GET['productId'];
   @$size_from_same_page_url=$_GET['size'];
   
   //Fetch imageThumbnail Table
   $table_to_fetch_imagethumb=$x->fetchTableByCategory('imagethumb',$product_id_from_product_thumbnail,'product_id');
   $imageThumb = mysqli_fetch_array($table_to_fetch_imagethumb);
   $image1 = $imageThumb['image1'];
   $image2 = $imageThumb['image2'];
   $image3 = $imageThumb['image3'];
   $image4 = $imageThumb['image4'];
   $image5 = $imageThumb['image5'];
   
   //Fetch Prodcut Table
   $table_to_fetch_product = $x->fetchTableByCategory('product',$product_id_from_product_thumbnail,'id');
   $product = mysqli_fetch_array($table_to_fetch_product);
   
	   $productName = $product['product_name'];
	   $productPrice =$product['product_price'];
	   $productColor = $product['product_color'];
       $productImage =$product['product_image'];
	   $productDescription=$product['product_desc'];
   
   
?>
<html>
<head>
<title>www.Ecommerce single wendor.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css?family=sans-serif" rel="stylesheet">
<link rel="stylesheet" href="css/style.css?v=1.2">
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
		<!-- breadcrumb section -->
			<div class="container">
			<ul class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Men's Clothing</a></li>
			  <li><a href="#">Men's T-shirts</a></li>
			  <li><a href="#">Wink New Half Sleeve T-Shirt</a></li>
			</ul>
		</div>
		<!-- //breadcrumb section -->

		<!-- prodDetails section -->
			<div class="container">
				<div class="prod-Details">
					<div class="row">
						<div class="col-md-2">
							<div class="prod-sidebar">
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image1).'" id="image1" onclick="imageChangeFunc(this.id)" style="height: 90px; width:100px; margin-bottom: 5px;">'; ?><br>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image2).'" id="image2" onclick="imageChangeFunc(this.id)" style="height: 90px; width:100px; margin-bottom: 5px;">'; ?><br>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image3).'" id="image3" onclick="imageChangeFunc(this.id)" style="height: 90px; width:100px; margin-bottom: 5px;">'; ?><br>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image4).'" id="image4" onclick="imageChangeFunc(this.id)" style="height: 90px; width:100px; margin-bottom: 5px;">'; ?><br>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image5).'" id="image5" onclick="imageChangeFunc(this.id)" style="height: 90px; width:100px; margin-bottom: 5px;">'; ?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="product-box">
							<script>
							  function imageChangeFunc(id)
							  {
								  var currentClickImage = document.getElementById(id).src;
								  document.getElementById("currentDisplayImage").src = currentClickImage;
							  }
							</script>
							<?php
						    echo '<img src="data:image/jpeg;base64,'.base64_encode($productImage).'" id="currentDisplayImage" style="width: 450px;height:500px">';
							?>
							<span class="product-Text">best seller</span>
						</div>
						</div>
						<div class="col-md-5">
							<h6 class="pro-name"><?php echo $productName ;?></h6>
							<div class="price-div">
								<span class="₹">₹ </span>
								<span class="rupee"><?php echo $productPrice ;?></span>
							</div>
							<div class="discount">
								<span class="dis-pric"></span>
								<span class="off"></span>
							</div>
								<span class="taxes"></span>
								<br> <br>
								<div class="size-wrapper">
								<div class="SelectSize-left">
								<span style="padding-right:10px;">Select Size</span>
							</div>
								<div class="SizeGuid-right">
								<span style="text-decoration: underline;"> Size Guide</span>
							</div>
							</div>
							<br>
							<span id="size-warning" style="color:red;font-size:12px;"></span>
							<br>
                            <?php   
							     $distinctRecord = $x->fetchDistinctRecord('size','size','product_id',$product_id_from_product_thumbnail);
								  while($sizeofProduct=mysqli_fetch_array($distinctRecord))
								  {  
									  $sizeName = $sizeofProduct['size'];  
								  
							?>
							<a href="single.php?productId=<?php echo $product_id_from_product_thumbnail ;?>&size=<?php echo $sizeName ;?>">
							<div class="sizechart" id="sizechart">
								  <span class="size-box"><?php echo $sizeName ;?></span>
							</div>
							 </a>
							<?php } ?>
							<br>
							<div class="add-btn">
								<div class="sizechart">
									<a class="iconlink" href="#" ondblclick="removeFromWishlist(<?php echo $product_id_from_product_thumbnail;?>);return false" onclick="addToWishlist(<?php echo $product_id_from_product_thumbnail; ?>);return false">
										 <i class="fas fa-heart" id="wishlist-icon" style="font-size: 26px; line-height: 50px;"></i>
									</a>
									<script>
									   function addToWishlist(proId)
									   {
										    
													 $.ajax({
											           url:"check-customer.php",
											           type:"POST",
											           data:{"wishlistProductId":proId},
											           success:function(response)
											          {
														if(response=="not loggedin")
														{
															alert("you must login first.");
															document.querySelector('.sign-box').style.display = 'flex';
														}
														else if(response=="Duplicate")
								                            {
																alert("Product Already Added in the wishlist");
															}
														else
														{
												        $("#wishlist-icon").css("color","#DD5044");
												        $("#navigation").load("single.php?productId="+proId+" #navigation");
														}
											           }
										             });
												
									   }
									    function removeFromWishlist(proId)
			                            {
				 
				                         $.ajax({
					                     url:"includes/delete.php",
					                     type:"POST",
                                         data:{"delete-id":proId,"from":"wishlist"},
					                     success:function()
					                     {
						                    $("#wishlist-icon").css("color","#333333");
						                    $("#navigation").load("single.php?productId="+proId+" #navigation");
					                      }
				                         });
			                          }
									</script>
								</div>
							<a href="#" onclick="addToBag(<?php echo $product_id_from_product_thumbnail ;?>,'<?php echo @$size_from_same_page_url; ?>')"><button class="btn btn-add pull-left">ADD TO BAG</button></a>
								</div>
								<script>
								  function addToBag(pID,pSIZE)
								  {
									  if(pSIZE== "" )
									  {
									    document.getElementById('size-warning').innerHTML="Please select size";
										return false;
									  }
									else{
									 $.ajax({
										 url:"cart.php",
										 type:"GET",
										 data:{"size":pSIZE,"productId":pID},
										 success:function()
										 {
											$('#navigation').load('single.php?productId=pID&size=pSize #navigation');
										 }
									 });
									}
								  }
								</script>
									<br>
							<div class="check-cod">
							<p><?php echo $productDescription ;?></p>
							<span class="cod">Check delivery date / COD availability</span>
							<br>
							<!--
							<input type="number" name="" value="" placeholder="Enter Pincode" required="" style="font-size: 12px; padding: 5px;">
							<button class="cod-submit" type="submit">CHECK</button>
							-->
							
							</div>
					</div>
					</div>
				</div>
			</div>
				<!-- //prodDetails section -->

				<!-- prod Description section -->

				<div class="container-fluid prod">
					<div class="container">
						<div class="row">
							
							<div class="col-md-6">
								<h4 class="prodHeading">REGULAR FIT</h4>
								<p class="txt1">
									Fits just right - not too tight, not too loose.</p>
									<h4 class="prodHeading">SINGLE JERSEY, 100% COTTON</h4>
									<p class="txt1">
										Classic, lightweight jersey fabric comprising 100% cotton with ribbed knit crew neck.
									</p>
									<div class="washcare">
										
									</div>
									<div class="washcare">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Do not iron  directly on prints."><img src="https://img.icons8.com/ios/50/000000/do-not-iron.png"
									style="width: 30px; height: 30px;">
										</a>
									</div>
									<div class="washcare">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Machine wash cold"><img src="https://img.icons8.com/ios/50/000000/washing-machine.png"
									style="width: 30px; height: 30px;">
									</a>
									</div>
									<div class="washcare">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Tumble dry low."><img src="https://img.icons8.com/ios/50/000000/tumble-dry-low-heat.png"
									style="width: 30px; height: 30px;">
									</a>
									</div>
									<div class="washcare">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Do not bleach."><img src="https://img.icons8.com/ios/50/000000/do-not-bleach.png"
									style="width: 30px; height: 30px;">
									</a>
									</div>
									<div class="washcare">
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="Do not wring."><img src="https://img.icons8.com/ios/50/000000/do-not-wring.png"
									style="width: 30px; height: 30px;">
  									</a>
								</div>
								
							</div>
							<div class="col-md-6">
								<h4 class="prodHeading">CASHBACK INFO</h4>
								<p class="txt1">
									Bewakoof coins cannot be redeemed on already discounted products
								</p>
								<h4 class="prodHeading">
									15 DAY RETURNS
								</h4>
								<p class="txt1">
									If you arent satisfied with this product, return it for a refund.


								</p>
							</div>
						</div>
					</div>
				</div>

		<!-- //prod Description section -->

      <!-- footer section -->
		<?php include 'includes/footer.php' ;?>
		<!-- //fotter section -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!--Custom Scripts-->
<script src="js/shopify.js"></script>
<!--Bootstrap Scripts-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>