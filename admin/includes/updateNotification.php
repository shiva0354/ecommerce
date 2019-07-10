<?php
include_once './connection.php';
$database = new Database;
$connection = $database->getConnection();

//update notification
@$view = $_POST["view"];
@$uid = $_POST["uid"];
@$table = $_POST["table"];
$updateW = "update $table set view='$view' where uid='$uid'";
$run=mysqli_query($connection,$updateW);

if($run)
{
	echo "updated";
}

?>