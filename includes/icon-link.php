 <form class="form-inline">
    	      <a class="iconlink" href="#"><i class="fas fa-search">|</i></a>
			  <div class="dropdown custom-dropdown">
			  <i class="fas fa-user dropdown-toggle" data-toggle="dropdown"></i>
			  <div class="dropdown-menu">
			    <div class="dropdown-item"><a class="custom-dropdown-link" href="#">My Account</a></div>
				<div class="dropdown-item"><a class="custom-dropdown-link"  href="check-customer.php">Login</a></div>
				<div class="dropdown-item"><a class="custom-dropdown-link"  href="logout.php?Men-Clothing=<?php echo $menClothing ;?>">Logout</a></div>
			  </div>
			  </div>
			  <!--Whislist Count-->
    	      <?php
			    @$mobile = $_SESSION['mobile'];
			    $w = $x->fetchTableByCategory('wishlist',$mobile,'uid');
              
			    $countWishList = mysqli_num_rows($w);
				if($countWishList > 0)
				{
			  ?>
			   <a href="wishlist.php"> <i  class="far fa-heart" style="color:#FFCE44"><?php echo $countWishList ;?></i></a>
				<?php } else {?>
				 <a href="check-customer.php"><i class="far fa-heart"><?php echo '' ;?></i></a>
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