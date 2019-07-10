<?php
class updateDatabase
{
function updateData($tablename,$attr1,$data1,$attr2,$data2,$connection)
{
	$query = "UPDATE $tablename set $attr1='$data1' where $attr2='$data2'";
	/*$stmt=$connection->prepare($query);
	$stmt->bind_param('b',$data1);
	$stmt->execute();*/
	$init = mysqli_query($connection,$query);
	return $init;
}
}
?>