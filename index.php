<?php
 session_start();
 require 'includes/fetch.php' ;
 $x = new fetchDatabase;
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
				<!-- carousel section -->


  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
	<!--Women-->
      <div class="carousel-item active" id="women">
        <a href="#"><img src="images/p.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
	  <!--Men-->
      <div class="carousel-item" id="men">
        <a href="#"><img src="images/p1.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
	  <!--Accessories-->
      <div class="carousel-item" id="accessories">
        <a href="#"><img src="images/pk.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br>

<!-- //carousel section -->

			<!-- arrivals section -->

			<div class="container">
				<h3 class="heading">new arrivals</h3>
				<hr>
				<br>
				<div class="row">
					<div class="col-md-6">
					   <?php
					    $selectWomenPro = $x->fetchTableByNewArrival('product','desc',2);
						$wompro = mysqli_fetch_array($selectWomenPro);
						$proId=$wompro['id'];
						$proName = $wompro['product_name'];
						$proCategory=$wompro['product_category'];
						$proImage = $wompro['product_image'];	
						echo '
						
						<a href="#">
						<img src="data:image/jpeg;base64,'.base64_encode($proImage).'" class="img-fluid"  onclick="redirectTo('.$proCategory.');return false" width="500" height="500"/>
						</a>';
						?>
					</div> 
					<div class="col-md-6">
						<?php
					    $selectMenPro = $x->fetchTableByNewArrival('product','desc',1);
						$menpro = mysqli_fetch_array($selectMenPro);
						$proId=$menpro['id'];
						$proName = $menpro['product_name'];
						$proCategory=$menpro['product_category'];
						$proImage = $menpro['product_image'];	
						echo '
						
						<a href="#">
						<img src="data:image/jpeg;base64,'.base64_encode($proImage).'" onclick="redirectTo('.$proCategory.');return false" class="img-fluid" width="500" height="500"/>
						</a>';
						?>
					</div>
				</div>
			</div>
            <script>
			   function redirectTo(productCategory)
			   {
				    if(productCategory==2)
					{
                      window.location = "womenclothing.php?productCategory="+productCategory+"&/new-arrivals-women";
					}
					else if(productCategory==1)
					{
						window.location = "menclothing.php?productCategory="+productCategory+"&/new-arrivals-men";
					}
				   //alert("Hi,I working");
			   }
			</script>
			
			<!-- //arrivals section -->

			<!-- design section -->
			<br>
				<div class="container">
				<h3 class="heading">design of the day</h3>
				<hr>
				<br>
				<h4 class="text-center">Starting at<br>Rs.259 ></h4>
				<p class="text-center">Expires in</p>
				<br>
				<div class="row">
				   <?php
				     $womencount=0;
					 $mencount=0;
					 $arr=array();
				     $currentDate = date("Y-m-d");
				     $sql = "select * from `soldout` where date=date_sub('$currentDate',interval 1 day)";
					 $run = mysqli_query($conn,$sql);
					 while($dotd=mysqli_fetch_array($run))
					 {
						 $soid = $dotd['product'];
						 $select = "select * from product where id = '$soid'";
						 $init = mysqli_query($conn,$select);
						
						 while($gd=mysqli_fetch_array($init))
						 { 
							 $product_category=$gd['product_category'];
							 $product_name=$gd['product_name'];
							 if($product_category==1 and $mencount==0)
							 {
							   //echo "This product is related to Men".$product_name."and its id is <Br>".$soid;
							   array_push($arr,$soid);
							   $mencount++;
							 }
							 else if($product_category==2 and $womencount==0)
							 {
							     //echo "This product is related to Women".$product_name."and its id is <Br>".$soid;
								 $womencount++;
								 array_push($arr,$soid);
							 }
                             
						 }
					 }
				   ?>
					<div class="col-md-6">
						<a href="#"><img src="images/d1.jpg" id="men" onclick="goto(this.id);return false" class="img-fluid"/></a>
					</div> 
					<div class="col-md-6">
						<a href="#"><img src="images/d2.jpg" id="women" onclick="goto(this.id);return false" class="img-fluid"/></a>
					</div>
				</div>
				<script>
				  function goto(gender,product)
				  {
					  if(gender=="men"){
						  window.location = "menclothing.php?productCategory=1&productDOTD=<?php echo $arr[1] ?>";
					  }
					  else if(gender=="women")
					  {
						   window.location = "womenclothing.php?productCategory=2&productDOTD=<?php echo $arr[0] ?>";
					  }
				  }
				</script>
				</div><br>
		<!-- //design section -->

			<!-- color of the month section --
			<div class="container">
				<h3 class="heading">color of the month</h3>
				<hr>
				</div><br>
			<div class="container-fluid bg">
			</div><br>
			color of the month section end--->

			<!-- hottest section -->
			<div class="container">
				<h3 class="heading">hottest seller</h3>
				<hr>
				<br>
				<?php
					 /*$select = "select product,product_category from wishlist group by product,product_category";  //to get duplicate record from table
					 $init = mysqli_query($conn,$select);
					 
					 while($data=mysqli_fetch_array($init))
					 {
						 $product = $data['product'];
						 $gender = $data['product_category'];
					 }
					 //$fetchProduct = $x->fetchTableByCategory('product',,'id');
					 //$product = mysqli_fetch_array($fetchProduct);
					 //$productName = $product['product_name'];
					 //$productImage = $product['product_image'];*/
					 $sql = "select product,product_category from wishlist group by product_category";
					 $run = mysqli_query($conn,$sql);
					 $arr = array();
					 while($wishlist = mysqli_fetch_array($run))
					 {
						 $productId = $wishlist['product'];
						 array_push($arr,$productId);
					 }
			    ?>
				<div class="row">
					<div class="col-md-6">
						<a href="#"><img src="images/a2.jpg" id="men" onclick="redirectHS(<?php echo $arr[0] ;?>,this.id);return false" class="img-fluid"/></a>
					</div> 
					<div class="col-md-6">
						<a href="#"><img src="images/h2.jpg" id="women" onclick="redirectHS(<?php echo $arr[0] ;?>,this.id);return false" class="img-fluid"/></a>
					</div>
				</div>
				<script>
				   function redirectHS(productId,productCat)
				   {
					   if(productCat=="men")
					   {
						   window.location="menclothing.php?productCategory=1&productIdHS="+productId;
					   }
					   else if(productCat=="women")
					   {
						   window.location="womenclothing.php?productCategory=2&productIdHS="+productId;
					   }
					   
				   }
				</script>
			</div><br>
			<!-- //hottest section -->

			<!-- product section -->

			<div class="container">
				<h3 class="heading">best seller</h3>
				<hr>
				<br>
				<div class="row">
				<!--Best Seller-->
				<?php
				 $getProduct = $x->fetchTableSoldOutForBestSeller('soldout');
				 while($so=mysqli_fetch_array($getProduct))
				 {
					 $soPro = $so['product'];
					 
					 //Now retrieving product from actual `product` table using `soldout` product id
					 $getActualProduct = $x->fetchTableByCategory('product',$soPro,'id');
					 while($product=mysqli_fetch_array($getActualProduct))
					 {
						 $product_name=$product['product_name'];
						 $product_price=$product['product_price'];
						 $product_category=$product['product_category'];
						 $product_image=$product['product_image'];
				?>
					<div class="col-md-3">
						<div class="product-box">
						<?php echo '<a href="single.php?productId='.$soPro.'"><img src="data:image/jpeg;base64,'.base64_encode($product_image).'"  height="250" width="250"/></a>' ;?>
						<div class="circle-btn">
						<?php echo'
						<a href="#" class="iconlink" onclick="addtoWishlist('.$soPro.','.$product_category.');return false" id="addtoWishlist'.$soPro.'">
						<i class="fas fa-heart"></i></a>'
						;?>
						</div>
						<span class="product-Text"> best seller</span>
					</div>
					<h3 class="Price">Boring Normal Half Sleeve T-Shirt</h3>
					<div class="productPriceBox">
						<span class="Price-text">₹ <b><?php echo $product_price;?></b></span>
						<span class="actualPriceText">499</span>
						<span class="discountPercentText">40% off</span>
					</div>
				
			   
				    </div>
				   <?php }}?>
				    <script>
			     function addtoWishlist(proId,proCat)
				 {
					 $.ajax({
						   url:"check-customer.php",
						   type:"POST",
						   data:{"wishlistProductId":proId,"productCategory":proCat},
						    success: function(response)
							{
								if(response=="not loggedin")
								{
									alert("You must login first");
									document.querySelector('.sign-box').style.display = 'flex';
								}
								else if(response=="Duplicate")
								{
									alert("Already Added");
								}
								else
								{
                                   $("#addtoWishlist"+proId).css("color","#DD5044");
							       $("#navigation").load("menclothing.php?Men-Clothing=1 #navigation");
								}
                            }
					 });
				 }
			  </script>
				 <!--End--->
				</div>
			</div>
			<br>
<!-- //product section -->

		<?php include 'includes/footer.php' ;?>
</body>
<!--Custom Scripts-->
<script src="js/shopify.js"></script>
<script>
var women = document.getElementById('women');
var men = document.getElementById('men');
var accesories = document.getElementById('accesories');
women.addEventListener('click',function(){
	window.location = "womenclothing.php?Women-Clothing=2";
});
men.addEventListener('click',function(){
	window.location="menclothing.php?Men-Clothing=1";
});
accessories.addEventListener('click',function(){
	alert("Nothing to show");
});
</script>
<!--Bootstrap Scripts-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>