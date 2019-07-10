
<?php 
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
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 	<link href="https://fonts.googleapis.com/css?family=sans-serif" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css?v=1.0">
</head>
<body>

<?php
    @$menClothing = $_GET['Men-Clothing'];
	$x = new fetchDatabase;
	if(isset($menClothing))
	$tablebycategory = $x->fetchTableByCategory('product',$menClothing,'product_category');
?>


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
    <a class="navbar-brand" href="#">Ecommerce Single Wendor</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">MEN </a>
    </li>
      	<li class="nav-item">
        <a class="nav-link" href="#">WOMEN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">MOBILE COVER </a>
    </li>
      	<li class="nav-item">
        <a class="nav-link" href="#">CLEARANCE ZONE</a>
      </li>
      
    </ul>
    <form class="form-inline">

    	     <a class="iconlink" href="#"><i class="fas fa-search">|</i></a>
    	      <a class="iconlink" href="#"><i class="fas fa-user"></i></a>
    	      <a class="iconlink" href="#"><i class="far fa-heart"></i></a>
    	      <a class="iconlink" href="#"><i class="fas fa-shopping-bag"></i></a>
    	  </form>
  </div>
</nav>
</div>
	
<!-- //nav section -->

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
				<div class="row">
					<div class="catbox">
					<div class="col-md-4">
						<h2 class="clothing-heading">Men Clothing
							<span style="color: #949494;font-size: 24px; font-weight: normal;">(399)</span>
						</h2>
						<hr class="line">
						<div class="filterBOX">
							<span class="filter">filter</span>
							<span class="clear">clear all</span>
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
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&ID=<?php echo $suboptionId;?>"><?php echo $suboptionName ;?></a>
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
						$table  = $x->fetchTable('size');
						while($size=mysqli_fetch_Array($table))
						{
							$sizeId = $size['id'];
							$sizeName=$size['size'];
							$sizeofProduct = $size['product_id'];
							
						
						?>
					      <a class="dropdown-item" href="category.php?size=<?php echo $sizeofProduct ;?>&Men-Clothing=<?php echo $_GET['Men-Clothing']?>&ID=<?php echo $suboptionId;?>"><?php echo $sizeName ;?></a>
						<?php } ?>
					      
					 </div>
					</div>
					</div>
					<br>
					<div class="category-box">
						<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background:none; border: none;">
					     <span style="color: #333;"> color</span>
					    </button>
					    <div class="dropdown-menu">
					      <a class="dropdown-item" href="#">red</a>
					      <a class="dropdown-item" href="#">blue</a>
					      <a class="dropdown-item" href="#">black</a>
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
						   <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Design=<?php echo $designId ;?>"><?php echo $designName ;?></a>
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
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Fit=Regular">Regular</a>
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'] ;?>&Fit=Slim">Slim</a>
					      
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
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Sleeves=FullSleeve">Full Sleeve</a>
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Sleeves=HalfSleeve">Half Sleeve</a>
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Sleeves=SleeveLess">Sleeceless</a>
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
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=RoundNeck">Round Neck</a>
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=Hood">Hood</a>
					      <a class="dropdown-item" href="category.php?Men-Clothing=<?php echo $_GET['Men-Clothing'];?>&Neck=TwoPieceCollar">Two Piece Collor</a>
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
					      <a class="dropdown-item" href="#">New:</a>
					      <a class="dropdown-item" href="#">Price:High to Low</a>
					       <a class="dropdown-item" href="#">Low to High</a>
					 </div>
					</div>
					</div>
				</div>
			</div>
					<div class="col-md-8">
					<div class="row">
					 <?php
					   while($clothing = mysqli_fetch_array($tablebycategory))
					   {
						   $productId = $clothing['id'];
						   $productName = $clothing['product_name'];
						   $productPrice = $clothing['product_price'];
						   $productImage =$clothing['product_image'];
					   
					echo ' 
						<div class="col-md-4">
							<div class="product-box">
						        <a href="#"><img src="data:image/jpeg;base64,'.base64_encode($productImage).'" class="img-fluid" height="400"/></a>
						        <div class="circle-btn">
						        <a class="iconlink" href="#"><i class="far fa-heart" style="color: #7e7e7e;"></i></a>
						        </div>
						       <span class="product-Text">'.$productName.'</span>
				         	</div>
					            <h3 class="Price">Boring Normal Half Sleeve T-Shirt</h3>
					        <div class="productPriceBox">
						        <span class="Price-text">₹ <b>'.$productPrice.'</b></span>
						        <span class="actualPriceText">499</span>
						       <span class="discountPercentText">40% off</span>
					        </div>
				         </div>';
				     ?>
					   <?php } ?>
					</div>
				</div>
			</div>
		</div>

					<!-- //category section -->

	<!-- footer section -->
			<?php include 'includes/footer.php' ;?>

		<!-- //fotter section -->













		




<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

