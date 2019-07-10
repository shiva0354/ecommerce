<?php 
require('connection.php');
$database = new Database;
$conn = $database->getConnection();
class deleteRecord
{
	function deleteItem($tblname,$id)
	{
		global $conn;
		$query = "delete from $tblname where  product = '$id' ";
		$init = mysqli_query($conn , $query);
		return $init;
	}
	
}
$id = $_POST['delete-id'];
$from = $_POST['from'];

$delete = new deleteRecord;
$getQuery= $delete->deleteItem($from,$id);
if($getQuery)
{
	echo "<script>window.open('../$from.php','_self')</script>";
}

?>