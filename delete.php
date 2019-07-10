<?php
require 'includes/connection.php';
$x = new Database;
$connection = $x->getConnection();
$delete_id =$_GET['delete-id'];
$from = $_GET['from'];

$delete = "delete from cart where product = '$delete_id'";
$init_delete = mysqli_query($connection,$delete);

if($init_delete)
{
	echo "<script>window.open('cart.php?cart','_self')</script>";
}
?>