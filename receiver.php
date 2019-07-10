<?php 
session_start();
@$uid = $_SESSION['mobile'];
require 'includes/connection.php';
$x = new Database;
$connection = $x->getConnection();

//Execute automatically and storing qty,size,price of a product into cartdetail
/*@$product =$_GET['product'];
@$qty =$_GET['qty'];
@$size =$_GET['size'];
@$price =$_GET['price'];
 
$insert_product_into_cart_detail = "insert into cartdetail(product,uid,size,qty,price) values ('$product','$uid','$size','$qty','$price') ";
$init_insert_product_into_cart_detail=mysqli_Query($connection,$insert_product_into_cart_detail);*/

//check receiver presence
$fetchAddress = "select * from address where uid = '$uid'";
$init_fetchAddress = mysqli_query($connection,$fetchAddress);

$address_in_the_db = mysqli_num_rows($init_fetchAddress);
if($address_in_the_db > 0)
{
	echo '<script>window.open("summary.php?size='.$size.'&productId='.$product.'&mobile='.$uid.'&qty='.$qty.'","_self")</script>';
}
else
{
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!--Custom-->
<style type="text/css">
  .my-input
  {
	  border-radius:0;
  }
 table
 {
	 border:none;
 }
 .my-button
 {
	 padding:1rem;
	 border:0;
	 border-radius:0;
	 color:white;
	 text-transform:uppercase;
	 font-weight:bold;
	 background-color:#FFCD43;
	 transition:all 500ms;
 }
 .my-button:hover
 {
	 background-color:transparent;
	 border:solid 2px #FFCD43;
	 color:#FFCD43;
 }
</style>
</head>
<body>

<!--form-->
<div class="container-fluid">
  <div class="container">
  <br>
  <h4><strong>Address</strong></h3>
  <br>
  </br>
     <div class="row">
	     <div class="col-sm-2"></div>
		 
		 <div class="col-sm-8">
		       <form action="" class="form-group" method="POST">
			       <table class="table table-borderless">
				     <tr>
					   <td><input type="text" class="form-control my-input" name="receiver_name" placeholder="Receriver Name"></td>
					   <td><input type="text" class="form-control my-input" name="phone_number" placeholder="Phone Number"></td>
					 </tr>
					 <tr>
					   <td colspan="2"><input type="text" class="form-control my-input" name="alternate_phone_number" placeholder="Alternate Phone"></td>
					 </tr>
					 <tr>
					 <th>Address</th>
					 </tr>
					 <tr>
					   <td><input type="text" class="form-control my-input" name="pincode" placeholder="Pincode"></td>
					   <td><input type="text" class="form-control my-input" name="address" placeholder="Address"></td>
					 </tr>
					 <tr>
					   <td><input type="text" class="form-control my-input" name="locality" placeholder="Locality"></td>
					   <td><input type="text" class="form-control my-input" name="landmark" placeholder="Landmark"></td>
					 </tr>
					 <tr>
					    <td><input type="text" class="form-control my-input" name="city" placeholder="City"></td>
						<td><input type="text" class="form-control my-input" name="state" placeholder="State"></td>
					 </tr>
					 <tr>
					   <td><input type="text" class="form-control my-input" name="country" placeholder="Country"></td>
					   <td>
					     <input type="submit" name="saveaddress" class="btn my-button" value="Save Address" />
					   </td>
					 </tr>

				   </table>
			   </form>
		 </div>
		 
		 <div class="col-sm-2"></div>
	 </div>
  </div>
</div>

<!--form end-->

<?php
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 $ReceiverName = mysqli_real_escape_string($connection,$_POST['receiver_name']);
	 $Phone = mysqli_real_escape_string($connection,$_POST['phone_number']);
	 $AlterPhone=mysqli_real_escape_String($connection,$_POST['alternate_phone_number']);
	 $Pincode=mysqli_real_escape_string($connection,$_POST['pincode']);
	 $Address=mysqli_real_escape_string($connection,$_POST['address']);
	 $Locality=mysqli_real_escape_String($connection,$_POST['locality']);
	 $Landmark=mysqli_real_escape_String($connection,$_POST['landmark']);
	 $City=mysqli_real_escape_string($connection,$_POST['city']);
	 $State=mysqli_real_escape_string($connection,$_POST['state']);
	 $Country=mysqli_real_escape_String($connection,$_POST['country']);
	 
	 $insertIntoAddress="insert into address (uid,receiver_name,phone_number,alternate_number,pincode,address,locality,landmark,city,state,country) values ('$uid','$ReceiverName','$Phone','$AlterPhone','$Pincode','$Address','$Locality','$Landmark','$City','$State','$Country')";
	 $init_insert_into_address = mysqli_query($connection,$insertIntoAddress);
	 
	 if($init_insert_into_address)
	 {
		 echo '<script>window.open("summary.php?size='.$size.'&productId='.$product.'&mobile='.$uid.'&qty='.$qty.'","_self")</script>';
	 }
	
 }
 
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>