<?php
class updateData
{
function updateCustomer($tablename,$firstname,$lastname,$mobile,$gender,$userId,$connection)
{
 $update = "update $tablename set firstname='$firstname',lastname='$lastname',mobile='$mobile',gender='$gender' where mobile = '$userId' ";
 $init = mysqli_query($connection,$update);
 return $init;
}
}
?>