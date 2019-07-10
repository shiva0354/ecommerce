<?php
include_once 'includes/connection.php';
$database=new Database;
$connection=$database->getConnection();

//Get customerUniqueId
$customerUniqueId=$_GET['customerUniqueId'];

//fetch Invoice and Shipping
$sql="select address.receiver_name,address.address,address.locality,address.city,address.pincode,address.country,address.landmark,address.phone_number,customer.firstname,customer.mobile,customer.email from address
 INNER JOIN customer on address.uid=customer.mobile where address.uid=?";
 $stmt=$connection->prepare($sql);
 $stmt->bind_param('s',$customerUniqueId);
 $stmt->execute();
 $result=$stmt->get_result();
 $stmt->close();
 
 $row=$result->fetch_array();
 $receiverName=$row['receiver_name'];
 $address=$row['address'];
 $locality=$row['locality'];
 $city=$row['city'];
 $pincode=$row['pincode'];
 $country=$row['country'];
 $landmark=$row['landmark'];
 $receiverPhone=$row['phone_number'];
 
 $invoiceName=$row['firstname'];
 $invoiceMobile=$row['mobile'];
 $invoiceEmail=$row['email'];
?>
<?php
session_start();
if(!$_SESSION['email'])
{
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<html>
<!--Bootstrap Css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>
<br>
<div class="container-fluid">
  <div class="container">
  <h3>Order Detail</h3>
  <hr>
   <?php
   $orderID=$_GET["orderId"];
   echo "Order No:#".$orderID;
   ?>
	<br><br>
     <div class="row">
	    <div class="col-sm-5">
		<b>Shipping Address</b><br>
		<hr>
		<span><?=$receiverName?></span><br>
		<span><?=$address?>,<?=$locality?></span><br>
		<span><?=$city?>,<?=$pincode?>,<?=$country?></span><br>
		<span><?=$landmark?></span><br>
		<span><b><?=$receiverPhone?></b></span>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
		<b>Invoice</b><br>
		<hr>
		<span><?=$invoiceName?></span><br>
		<span><?=$invoiceMobile?></span><br>
		<span><?=$invoiceEmail?></span><br>
		</div>
	 </div>
	 <br><br>
	 <!--Product Detail Table-->
	 <h3>Shopping Cart</h3>
	 <hr>
	 <br>
	 <table class="table table-bordered">
	  <tr>
	    <th>Count</th>
		<th>Size</th>
	    <th>Name</th>
	    <th>Unit Price</th>
	    <th>Total Price</th>
        </tr>	  
		<?php 
	   $sql2="select * from soldout where uid=?";
	   $stmt2=$connection->prepare($sql2);
	   $stmt2->bind_param('s',$customerUniqueId);
	   $stmt2->execute();
	   $result2=$stmt2->get_result();
	   $stmt2->close();
	   
	   $arr=array();
	   
	   while($product=$result2->fetch_array()){
	   $orderid=$product['orderid'];
	   $productId=$product['product']; //product id
	   $price=$product['price'];
	   $size=$product['size'];
	   $qty=$product['qty'];
	   
	   $data=$price*$qty;
	   
	   //$totalPriceQTY=$price*$qty;
	   array_push($arr,$data);
	   $totalPrice=array_sum($arr);
	   //fetch Actual Product from Product Table According to `soldout` product
	   $sql3="select * from product where id = ?";
	   $stmt3=$connection->prepare($sql3);
	   $stmt3->bind_param('s',$productId);
	   $stmt3->execute();
	   $result3=$stmt3->get_result();
	   $stmt3->close();
	   
	   $ActualProduct=$result3->fetch_array();
	   $productName=$ActualProduct['product_name'];
	 ?>
		<tr>
		 <td><?=$qty?></td>
		 <td><?=$size?></td>
		 <td><?=$productName?></td>
		 <td><?=$price?></td>
		 <td><?=$price*$qty?></td>
		</tr>
	   <?php } ?>
	 </table>
	 <br>
	 <span class="float-right"><b>Total Amount:&nbsp;</b><?=$totalPrice?>&nbsp;INR<br></span><br><br>
	 <button class="btn btn-primary float-right" onclick="addDelivery();return false">Add Delivery</button>
  </div>
</div>

<!--PopUp-->
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4 text-white" id="popup">
<span><b>Delivery</b></span><br><br>
<form method="post" class="form-group">
   <table class="table table-bordered text-white">
   <tr>
   <td>
   <span>Select Service</span>
   <select name="courierService" class="form-control">
     <option value="">Blue Dart Express</option>
	 <option value="">Speed Post</option>
   </select>
   </td>
   </tr>

   <tr>
     <td><span>Tracking Number</span><input class="form-control" type="text" name="trackNumber" autocomplete="off"></td>
   </tr>
   <tr>
   <td><span>Add Delivery Date</span><input class="form-control" type="date" name="deliveryDate"></td>
   </tr>
   <tr>
     <td></span><input class="form-control btn btn-primary" type="submit" name="addDelivery" id="btn" value="Add Delivery"></td>
   </tr>
   </table>
</form>
</div>
<div class="col-sm-4"></div>
</div>
<?php 
if(isset($_POST['addDelivery']))
{
	$courierService = $_POST['courierService'];
	$trackNumber = $_POST['trackNumber'];
	$deliveryDate = $_POST['deliveryDate'];
}
?>
<!--Pop Up End-->
</body>
<!--Style-->
<style>
#popup
{
	display:none;
	background-color:#4B8BF4;
	position:absolute;
	left:500px;
	top:250px;
	margin-bottom:-500px;
	z-index:5;
}
</style>
<!--Custom Scripts-->
<script>
function addDelivery()
{
	document.getElementById('popup').style.display="block";
}
</script>
<!--Bootstrap Scripts-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
<?php } ?>