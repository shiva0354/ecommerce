<?php
session_start();
require 'includes/fetch.php';
@$uid = $_SESSION['mobile'];


$x = new fetchDatabase;
$tablebycategory = $x->fetchTableByCategory('cart',$uid,'uid');

while($product_acc_cart = mysqli_Fetch_array($tablebycategory))
{
	$id = $product_acc_cart['id'];
	$productId = $product_acc_cart['product'];
	$productSize=$product_acc_cart['size'];
	$productQty = $product_acc_cart['qty'];
	$productPrice=$product_acc_cart['price'];
	
	
	//fetch customer 
	$select = "select firstname from customer where mobile='$uid'";
	$run=mysqli_query($conn,$select);
	$get=mysqli_fetch_array($run);
	$fname=$get['firstname'];
	$phone=substr($uid,3,6);
	
	$orderid=date("Ymd/").$phone; //generate order id
	//echo $orderid;
	
	//create date function
	$date = date("Y-m-d");
	
	//echo $productId."\r\n".$productSize."\r\n".$productQty."\r\n".$productPrice."\r\n"."\r\n".$date;
	
	//Insert Product Into `soldout`
	$view="no";
	$sql = "insert into soldout(orderid,product,size,uid,price,qty,date,view) values(?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sisidiss',$orderid,$productId,$productSize,$uid,$productPrice,$productQty,$date,$view);
	$stmt->execute();
	
	//Delete Product from `cart` also
	$del = "delete from cart where uid=?";
	$delStmt=$conn->prepare($del);
	$delStmt->bind_param('i',$uid);
	$delStmt->execute();
}

?>
<div id="payment_pend">
<center>
Payment<br>
<input type="button" id="payment" value="payment" name="pay">
</center>
</div>
<!--Custom Script-->
<script>
var payment=document.getElementById("payment");
payment.addEventListener('click',function(){
      window.open ("response.php",
"mywindow","status=1,toolbar=0"); 
});
</script>
