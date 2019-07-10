<?php
require 'includes/connection.php';
$x = new Database;
$con = $x->getConnection();

session_start();
if(!isset($_SESSION['mobile']))
{
	echo "not loggedin";
}
else
{
 @$_get_productid = $_POST['wishlistProductId'];
 @$_get_productCat = $_POST['productCategory'];
 $mobile = $_SESSION['mobile'];
 if($_get_productid!=0)
 {	 
 //Check Duplicacy
 $select = "select * from wishlist where uid='$mobile' and product='$_get_productid'";
 $run = mysqli_query($con,$select);
 $count = mysqli_num_rows($run);
 if($count>0)
 {
	 echo "Duplicate";
 }
 else 
 {
 //Insert into wishlist
 $insertWishlist = "insert into wishlist (product,uid,product_category)  values ('$_get_productid','$mobile','$_get_productCat')";
 $initializeWishlist = mysqli_query($con,$insertWishlist);
 }
 
 }
  //echo "<script>window.open('menclothing.php?Men-Clothing=1','_self')</script>";
}
?>