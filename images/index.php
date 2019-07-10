<?php
session_start();
if(!($_SESSION['email']))
{
	echo "<script>window.open('../login.php','_self')</script>";
}
else
{
	http_response_code(403);
}
?>