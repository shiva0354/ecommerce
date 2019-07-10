
<?php
session_start();
require 'includes/fetch.php';
@$uid = $_SESSION['mobile'];


$x = new fetchDatabase;
$tablebycategory = $x->fetchTableByCategory('cart',$uid,'uid');
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
<br><br>
<div class="text-center"><h4>Product Summary</h4></div>
<br><br>			
<!-- left section -->
<div class="container">
      <div class="row">
	  <!--Image Section-->
      <div class="col-md-7" style="border:1px solid #eee;">
       <div class="cart-Total">
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
					 $productQty = $product_acc_cart['qty'];
					 $productPrice=$product_acc_cart['price'];
					 
					 $select_product_acc_cart = "select * from product where id = '$productId'";
	                 $init_product_acc_cart = mysqli_query($conn,$select_product_acc_cart);
					 
					 while($productC = mysqli_Fetch_array($init_product_acc_cart))
					 {
						 $productId = $productC['id'];
		                 $productName=$productC['product_name'];
     					 $productImage=$productC['product_image'];
					 }
					
			?>
		
              <div class="row ">
			  
                <?php echo '<div class="col-sm-3"> <img src="data:image/jpeg;base64,'.base64_encode($productImage).'" style="height: 150px;"></div>';?>
                <div class="col-sm-9">
                  <span class="prodName right"><?php echo $productName ;?></span><br>
                  <span class="item-price">₹ <?php echo $productPrice ;?></span>
                    <div class="sizecart"> 
                      <span class="item-size">Size:<?php echo $productSize ;?></span>
                      <span class="item-size">Qty:<?php echo $productQty ;?></span>
                    </div><br><br>
                    <div class="removeitem">
                     <a href="delete.php?delete-id=<?php echo $productId ;?>&from=cart"> <span class="removeITEM">Remove</span> </a>
                      <span class="later">|Save for later</span>
                    </div>
				 
                </div>
              </div>
			  	<?php }?>
             </div>
          </div>
        </div>
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
					 $productPrice=array($product_acc_cart['price']);
					 
					 
					 $total+=array_sum($productPrice)*$productQty;
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
        <td>₹ <?php echo $total ; ?></td>
      </tr> 
       </table><br>
      <div class="cart-btn">
      <a href="#" onclick="redirectToPayment()" class="btn btn-con">Proceed To Payment</a>
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
<!--Custom Script-->
<script>
function redirectToPayment()
{
	window.location = "payment.php";
}
</script>
</body>
</html>
		
			
