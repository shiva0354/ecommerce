
<?php
session_start();
require 'includes/fetch.php';
@$size = $_GET['size'];
@$product =$_GET['productId'];
@$uid = $_SESSION['mobile'];

$x = new fetchDatabase;
$tablebycategory = $x->fetchTableByCategory('cart',$uid,'uid');

if(!isset($_SESSION['mobile']))
{
	echo "<script>window.open('message.php','_self')</script>";     //here we check , whether user login or not 
}

else if(!isset($_GET['cart']))
{
//fetch product from product table 
$fetchProductTable = $x->fetchTableByCategory('product',$product,'id');
while($p = mysqli_fetch_array($fetchProductTable))
{
	$price = $p['product_price'];
	$qty= 1;

$insert = "insert into cart (product,size,uid,price,qty) values ('$product','$size','$uid','$price','$qty')";   //Here whishlist product added to cart table
mysqli_query($conn,$insert);
}

$del = "delete from wishlist where product = '$product'";   //after storing in cart , whishlist product also deleted
mysqli_query($conn,$del);
 
echo "<script>window.open('wishlist.php','_self')</script>";
}

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
     <form class="form-inline">
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

		<!-- left section -->
<div class="container">
      <div class="row">
	  <!--Image Section-->
      <div class="col-md-7" style="border:1px solid #eee;">
       <div class="cart-Total">
            <span class="pull-left hidden-xs">
              My Bag <br>
			    <?php
			    $count =0;
			    while(mysqli_fetch_Array($tablebycategory))
				{	
				  $count++;
				}
			  ?>
              <span class="qty">(<?php echo $count ;?>)</span>
            </span>
		<form method="POST">
	    <div class="cartProduct">
           <div class="cartItem">
            		<?php
                $selectCart = "select * from cart where uid = '$uid'";
				$init_cart = mysqli_query($conn,$selectCart);
			    while($product_acc_cart = mysqli_Fetch_array($init_cart))
				 {
					 $id = $product_acc_cart['id'];
	                 $productId = $product_acc_cart['product'];
	                 $productSize=$product_acc_cart['size'];
					 
					 $select_product_acc_cart = "select * from product where id = '$productId'";
	                 $init_product_acc_cart = mysqli_query($conn,$select_product_acc_cart);
					 
					 while($productC = mysqli_Fetch_array($init_product_acc_cart))
					 {
						 $productId = $productC['id'];
		                 $productName=$productC['product_name'];
						 $productPrice = $productC['product_price'];
						 $productImage=$productC['product_image'];
					 }
					
			?>
              <div class="row" id="product-section" style="margin-top:20px;">
			  
                <?php echo '<div class="col-sm-3"> <img src="data:image/jpeg;base64,'.base64_encode($productImage).'" style="height: 150px;"></div>';?>
                <div class="col-sm-9">
                  <span class="prodName right"><?php echo $productName ;?></span><br>
                  <span class="item-price">₹ <?php echo $productPrice ;?></span>
                    <div class="sizecart"> 
                      <span class="item-size">Size:</span>
					  <select name="size">
					               <?php
		                            $sizeTable = "select distinct size from size where product_id = '$productId'";
									$executeSizeTable = mysqli_query($conn , $sizeTable);
		                            while($size = mysqli_fetch_array($executeSizeTable))
		                            {
			                         $sizeId = $size['id'];
			                         $sizeName =$size['size'];
									
									 ?>
					       <option value="<?php echo $sizeName?>"><?php echo $sizeName ;?></option>
						   <?php } ?>
					  </select>
                      <span class="item-size">Qty:</span>
                      <select name="qty" onchange="update(<?php echo $id ;?>,this.value)">
					      <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="5">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
						  <option value="10">10</option>
					  </select>
                    </div><br><br>
                    <div class="removeitem">
					 <a href="#" onclick="deleteProduct(<?php echo $productId ;?>);return false"> <span class="removeITEM">Remove</span> </a>
                      <span class="later">|Save for later</span>
                    </div>
				 
                </div>
              </div>
			  			 			<?php }?>
             </div>
          </div>
        </div>
          <script>
		       function deleteProduct(proId)
			   {
				   $.ajax({
					   url:"includes/delete.php",
					   type:"POST",
					   data:{"delete-id":proId,"from":"cart"},
					   success:function(){
						   $('#product-section').load("cart.php?cart #product-section");
						   $('#icon-menu').load("cart.php?cart #icon-menu");
					   }
				   });
			   }
		  </script>
          
</div>
 <!--Cart Product Section End-->

      <div class="col-md-5" style="background-color: #fbfbfb;">
        <h6 class="gift">Have a Gift Code?</h6>
        <h6 class="order" style="font-weight: bold;padding: 10px 10px;">Order Summery</h6>
      <?php
	            $total = 0;
                $selectCart = "select * from cart where uid = '$uid'";
				$init_cart = mysqli_query($conn,$selectCart);
			    while($product_acc_cart = mysqli_Fetch_array($init_cart))
				 {
					 $id = $product_acc_cart['id'];
	                 $productId = $product_acc_cart['product'];
	                 $productSize=$product_acc_cart['size'];
					 $productQty = $product_acc_cart['qty'];
					 
					 $select_product_acc_cart = "select * from product where id = '$productId'";
	                 $init_product_acc_cart = mysqli_query($conn,$select_product_acc_cart);
					 while($productC = mysqli_Fetch_array($init_product_acc_cart))
					 {
						 
						 $productId = $productC['id'];
		                 $productName=$productC['product_name'];
						 $price = array($productC['product_price']*$productQty);
						 $productImage=$productC['product_image'];
						
					 }
					 $total+=array_sum($price);
				 }
				 
			?>
      <div class="payment">
       <table style="width: 100%;">
        <tr>
         <td>Total MRP (Inclusive of all taxes)</td>
				 <td><?php echo $total ;?> Rs</td>
      </tr>
				
      <tr>
         <td>Shipping Charges</td>
        <td  style="color: #6fba1e; font-weight: bold;">  FREE</td>
      </tr>
       </table>
      </div><br>
      <div class="note">
        <strong>Note:</strong>Bewakoof Coins not applicable on discounted products
      </div> 
      <br>
       <p class="saving">You are saving ₹ 1300 on this order.</p>
       <br>
       <table class="amount">
       <tr>
         <td>Payable Amount</td>
        <td class="payment">₹ <?php echo $total ; ?></td>
      </tr> 
       </table><br>
      <div class="cart-btn">
       <input type="submit" value="Proceed to checkout" class="btn-con">
		</form>
      </div> <br><br>
      <div class="coin text-center">
        <span class="box1">  <i class="fas fa-rupee-sign"></i>You will earn Bewakoof Coins worth 10% of this order.</span>
        </div>
    </div>
    
        
      </div>
      
    </div>
  
      <br><br>

		<!-- //left section -->
			

		<!-- footer section -->
     <?php include 'includes/footer.php' ;?>

		<!-- //fotter section -->
<!--Custom Scripts-->
<script src="js/shopify.js"></script>
<!--Bootstrap Scripts-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php

  echo "<script>
               function update(id,qty)
			   {
				   $.ajax({
					    url:'cart.php?cart',
						type:'POST',
						data:{'id':id,'qty':qty},
						success:function(){	
						    $('.payment').load('cart.php?cart .payment');
						}
				   });
			   }
        </script>";
	@$cid = $_POST['id'];
    @$qqty = $_POST['qty'];
    $update = "update cart set qty = '$qqty' where id ='$cid'";
	$run_update = mysqli_query($conn,$update);

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 $size = $_POST['size']; 
	 $qty = $_POST['qty'];
	 $product = $productId;
	 $price = $total;
	 echo '<script>window.open("receiver.php?product='.$product.'&qty='.$qty.'&size='.$size.'&price='.$price.'","_self")</script>';
 }
?>
			
			
