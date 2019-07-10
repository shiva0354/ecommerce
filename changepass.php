<?php
session_start();
require 'includes/connection.php';
$dbObject = new Database;
$connection = $dbObject->getConnection();
?>
<html>
<head>
<title>www.Ecommerce single wendor.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css?family=sans-serif" rel="stylesheet">
<link rel="stylesheet" href="css/style.css?v=1.2">
</head>
<body>
<br><br>
  <div class="row">
     <div class="col-sm-4"></div>
	 <!--Change Password-->
	 <div class="col-sm-4">
	    <h5 class="title">Change Password</h5>
		<hr class="HR"><br><br>
	    <form action="" method="post" class="form-group">
		  <input type="text" name="newpassword" class="form-control" placeholder="Enter New Password" autocomplete="off"><br>
		  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" autocomplete="off"><br>
		  <input type="submit" name="changepass" class="submit" value="Change Password"><br>
		</form>
		<br><br>
		<?php echo "<a href='profile.php'>Go To Profile</a>";?>
	 </div>
	 <!--Change Password End-->
	 <div class="col-sm-4"></div>
  </div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$newPass = $_POST['newpassword'];
	$confirmPass=$_POST['confirmpassword'];
	if(empty($newPass) || empty($confirmPass))
	{
		echo "<script>alert('Empty Field Found!')</script>";
		echo "<script>window.open('changepass.php','_self')</script>";
    }
	else
	{
	  if($newPass === $confirmPass)
	 {
		$sql = "update customer set password=? where mobile = ?";
		$stmt = $connection->prepare($sql);
		
		$stmt->bind_param('ss',$newPass,$_SESSION['mobile']);
		$stmt->execute();
		if($stmt->error)
		{
		   echo "Failure!!!".$stmt->error;
		}
		else
		{
			echo "Password Has Been Changed!";
		}
		$stmt->close();
		
	  }
	}
	
}
?>