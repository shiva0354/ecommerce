<?php require 'includes/connection.php';?>
<?php
session_start();
if(!$_SESSION['email'])
{
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<html>
<head>
<title>catoption</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="row">
<div class="col-sm-4"></div>
<!--category form-->
<div class="col-sm-4">
<center><h4><strong>Category Option</strong></h4></center><br>
<form action="" method="post">
<table class="table table-borderless">
    <tr>
	  <th></th>
	  <td><input type="text" name="catoption" class="form-control"></td>
	</tr>
	<tr>
	  <td></td>
	  <td><input type="submit" value="Insert" class="btn btn-primary form-control"></td>
	</tr>
</table>
</form>
<?php
$x = new Database;
$conn = $x->getConnection();
if($_SERVER['REQUEST_METHOD']=="POST")
{
	 $option = mysqli_real_escape_string($conn,$_POST['catoption']);
	 $insert = "insert into catoption (catoption) values ('$option')";
	 $init = mysqli_query($conn,$insert);
	 if($init)
	 {
       echo "<script>alert('Category Inserted!')</script>";
	   header("location:catoption.php");
	 }
}
?>
</div>
<!--end-->
<div class="col-sm-4"></div>
</div>

<!--Bootstrap Script-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>