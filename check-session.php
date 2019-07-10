<?php
session_start();
if(isset($_SESSION['mobile']))
{
	echo "Active";
}
else
{
	echo "Disable";
}
?>
