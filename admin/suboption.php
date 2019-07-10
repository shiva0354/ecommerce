<?php require 'includes/connection.php';?>
<html>
<head>
<title>Sub Option</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="row">
<div class="col-sm-4"></div>
<!--category form-->
<div class="col-sm-4">
<center><h4><strong>Sub-Option</strong></h4></center><br>
<form action="" method="post">
<table class="table table-borderless">
    <tr>
	  <th></th>
	  <td><input type="text" name="suboption" class="form-control"></td>
	</tr>
	 <tr>
	  <th></th>
	  <td>
	  <select name="catoption" class="form-control">
	  <option><strong>Category Option</strong></option>
	  <?php
	 $x = new Database;
	 $conn = $x->getConnection();
	 $fetch = "select * from catoption";
	 $run = mysqli_query($conn,$fetch);
	 while($data = mysqli_fetch_array($run))
	 {
		 $id = $data['id'];
		 $catoption = $data['catoption'];
	 
	?>
	       <option value="<?php echo $id; ?>"><?php echo $catoption ;?></option>
	   <?php }?>
	   </select>
	  </td>
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
	 $suboption = mysqli_real_escape_string($conn,$_POST['suboption']);
	 $insert = "insert into suboption (suboption,catoption) values ('$suboption','$option')";
	 $init = mysqli_query($conn,$insert);
	 if($init)
	 {
       echo "<script>alert('Category Inserted!')</script>";
	   header("location:suboption.php");
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