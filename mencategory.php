
<?php 
session_start();
require 'includes/fetch.php'; 
?>

<!DOCTYPE html>
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

<?php
    @$menClothing = $_GET['Men-Clothing'];
	@$categoryID = $_GET['ID'];
	@$sizeofProductId=$_GET['size'];
	@$productDesign=$_GET['Design'];
	@$productFit=$_GET['Fit'];
	@$productSleeve=$_GET['Sleeves'];
	@$neck = $_GET['Neck'];
	@$color = $_GET['Color'];
	$x = new fetchDatabase;
	if(isset($_GET['size']))
	{
	$tablebycategory = $x->fetchTableByCategory('product',$sizeofProductId,'id');
	}
	else if(isset($_GET['Men-Clothing'])and isset($_GET['ID']))
	{
	$tablebycategory = $x->fetchTableByCategoryMen('product',$categoryID,$menClothing,'product_suboption');
	}
	else if(isset($_GET['Design'])and isset($_GET['Men-Clothing']))
	{
		$tablebycategory = $x->fetchTableByCategoryMen('product',$productDesign,$menClothing,'product_design');
	}
	else if(isset($_GET['Fit'])and isset($_GET['Men-Clothing']))
	{
		$tablebycategory = $x->fetchTableByCategoryMen('product',$productFit,$menClothing,'product_fit');
	}
	else if(isset($_GET['Sleeves']) and isset($_GET['Men-Clothing']))
	{
	      $tablebycategory = $x->fetchTableByCategoryMen('product',$productSleeve,$menClothing,'product_sleeves');
	}
	else if(isset($_GET['Neck']) and isset($_GET['Men-Clothing']))
	{
		$tablebycategory = $x->fetchTableByCategoryMen('product',$neck,$menClothing,'product_neck');
	}
	else if(isset($_GET['Color']) and isset($_GET['Men-Clothing']))
	{
		$tablebycategory = $x->fetchTableByCategoryMen('product',$color,$menClothing,'product_color');
	}
?>

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

			<!-- category section -->
			<div class="container">
			<!--Mobile Device Filter-->
             <?php include 'includes/mobile-device-menu-men.php' ;?>
             <!--Mobile Device Filter End--->
			 <br><br><br>
				<div class="row">
					<div class="catbox">
					<div class="col-md-4">
						<h2 class="clothing-heading">Men Clothing
							<span style="color: #949494;font-size: 24px; font-weight: normal;">
							 <?php
							  $count=0;
							  $product = $x->fetchTableByCategory('product',$menClothing,'product_category');
							  while($a = mysqli_fetch_array($product))
							  {
								  $count++;
							  }
							  echo "(".$count.")";
							 ?>
							</span>
						</h2>
						<hr class="line">
						<div class="filterBOX">
							<span class="filter">filter</span>
							<span class="clear"><a href="menclothing.php?Men-Clothing=<?php echo $menClothing ;?>">clear all</a></span>
						</div>
							<br>
							<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Category</span>
					    </button>
					    <div class="dropdown-menu">
						<?php
						      $x = new fetchDatabase;
                              $Limit = $x->fetchLimit('suboption');
						  while($data = mysqli_fetch_array($Limit))
						  {
							  $suboptionId = $data['id'];
							  $suboptionName = $data['suboption'];
						  ?>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing']?>&ID=<?php echo $suboptionId;?>"><?php echo $suboptionName ;?></a>
						  <?php } ?>
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Sizes</span>
					    </button>
					    <div class="dropdown-menu">
						<?php
						$fetch_size_table = "select distinct size from size";
						$init = mysqli_query($conn , $fetch_size_table);
						while($size=mysqli_fetch_Array($init))
						{
							
							$sizeName=$size['size'];
							
                            $select_size_table = "select * from size where size = '$sizeName'";
							$run = mysqli_query($conn,$select_size_table);
							
							$ssize = mysqli_fetch_array($run);
							$sizeofProduct = $ssize['product_id'];
							

						?>
					      <a class="dropdown-item" href="mencategory.php?size=<?php echo $sizeofProduct ;?>&Men-Clothing=<?php echo $_GET['Men-Clothing']?>&ID=<?php echo $suboptionId;?>"><?php echo $sizeName ;?></a>
						<?php } ?>
					      
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" id="color-btn" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;">color</span>
					    </button>
					    <div class="dropdown-menu">
						<?php
						   $fetch_color_from_product = "select distinct product_color from product where product_category ='$menClothing'";
						   $initialize_color = mysqli_query($conn , $fetch_color_from_product);
						   $colorName = "";
						   while($color = mysqli_fetch_array($initialize_color))
						   {   
							   $colorName = $color['product_color'];
						      
						?>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $menClothing ;?>&Color=<?php echo $colorName ;?>"><?php echo $colorName ;?></a>
						  
						   <?php } ?>
						  
							
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Design</span>
					    </button>
					    <div class="dropdown-menu">
					      <?php
						      $designTable = $x->fetchTable('design');
							  while($design = mysqli_Fetch_Array($designTable))
							  {
								  $designId=$design['id'];
								  $designName=$design['design'];
							  
						   ?>
						   <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Design=<?php echo $designId ;?>"><?php echo $designName ;?></a>
						   <?php }?>
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Fit</span>
					    </button>
					    <div class="dropdown-menu">
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Fit=Regular">Regular</a>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Fit=Slim">Slim</a>
					      
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Sleeve</span>
					    </button>
					    <div class="dropdown-menu">
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Sleeves=FullSleeve">Full Sleeve</a>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Sleeves=HalfSleeve">Half Sleeve</a>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Sleeves=SleeveLess">Sleeve Less</a>
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> Neck</span>
					    </button>
					    <div class="dropdown-menu">
					     <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=RoundNeck">Round Neck</a>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=Hood">Hood</a>
					      <a class="dropdown-item" href="mencategory.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=TwoPieceCollar">Two Piece Collor</a>
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;">Sort By</span>
					    </button>
					    <div class="dropdown-menu">
					      <a class="dropdown-item" href="#">Popular</a>
					      <a class="dropdown-item" href="menclothing.php?new">New:</a>
					      <a class="dropdown-item" href="menclothing.php?sort-high-2-low">Price:High to Low</a>
					       <a class="dropdown-item" href="menclothing.php?sort-low-2-high">Low to High</a>
					 </div>
					</div>
					</div>
				</div>
			</div>
					<div class="col-md-8">
					<div class="row">
					 <?php
					   while(@$clothing = mysqli_fetch_array($tablebycategory))
					   {
						   $productId = $clothing['id'];
						   $productName = $clothing['product_name'];
						   $productPrice = $clothing['product_price'];
						   $productImage =$clothing['product_image'];
					   
					echo ' 
						<div class="col-md-4">
							<div class="product-box">
						        <a href="single.php?productId='.$productId.'"><img src="data:image/jpeg;base64,'.base64_encode($productImage).'" class="img-fluid" height="400"/></a>
						        <div class="circle-btn">
						         <a href="#" class="iconlink" onclick="addtoWishlist('.$productId.');return false" id="addtoWishlist'.$productId.'">
								<i class="fas fa-heart"></i></a>
						        </div>
						       <span class="product-Text">'.$productName.'</span>
				         	</div>
					            <h3 class="Price">Boring Normal Half Sleeve T-Shirt</h3>
					        <div class="productPriceBox">
						        <span class="Price-text">₹ <b>'.$productPrice.'</b></span>
						        <span class="actualPriceText">499</span>
						       <span class="discountPercentText">40% off</span><br>
					        </div>
				         </div>';
				     ?>
					   <?php } ?>
					</div>
				</div>
			</div>
		</div>
                <script>
			     function addtoWishlist(proId,e)
				 {
					 $.ajax({
						   url:"check-customer.php",
						   type:"POST",
						   data:{"wishlistProductId":proId},
						    success: function(response)
							{
								if(response=="not loggedin")
								{
									alert("You must login first");
									document.querySelector('.sign-box').style.display = 'flex';
								}
								else if(response=="Duplicate")
								{
									alert("Product Already Added in the wishlist");
								}
								else
								{
                                   $("#addtoWishlist"+proId).css("color","##DD5044");
							       $("#navigation").load("menclothing.php?Men-Clothing=1 #navigation");
								}
                            }
					 });
				 }
			  </script>
					<!-- //category section -->

	<!-- footer section -->
		<?php include 'includes/footer.php' ;?>
		<!-- footer section -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
<!--Custom Scripts-->
<script src="js/shopify.js"></script>
<!--Bootstrap Scripts-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
