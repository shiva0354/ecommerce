<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if(!$_SESSION['email'])
{
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Single Vendor | Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php
				include('includes/header.php');
				?>
<!--header end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->

<div class="inner-block">
<span>Change Password</span><br><br>
<!--Change Passowrd-->
<div class="row">
<div class="col-sm-4" style="border-right:solid 1px gray;">
<form class="form-group" method="POST">
   <input type="text" class="form-control" name="newpassword" autocomplete="off" placeholder="New Password"><br><br>
   <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password"><br><br>
   <input type="submit" class="btn btn-primary" name="updatepass" value="Reset">
</form>
</div>
<?php
if(isset($_POST['updatepass'])){
	$password=$_POST['newpassword'];
	$confirmpassword=$_POST['confirmpassword'];
	$phone=$_SESSION['mobile'];
	if($password == $confirmpassword)
	{
	    $update="update admin set password='$password' where phone='$phone'";
		$stmt=$connection->prepare($update);
		$stmt->bind_param('ss',$password,$_SESSION['mobile']);
		$stmt->execute();
		$stmt->close();
		//$stmt=mysqli_query($connection,$update);
		if($stmt)
		{
			echo "<script>alert('Password Updated')</script>";
		    echo "<script>window.open('setting.php','_self')</script>";
		}
	}
	else
	{
		echo "<script>alert('Password doesn\'t match')</script>";
		echo "<script>window.open('setting.php','_self')</script>";
	}
}
?>
<div class="col-sm-1"></div>
<div class="col-sm-7">
  <span>Add New Admin</span><br><br>
  <form method="POST" enctype="multipart/form-data" class="form-group">
      <div class="row">
	    <div class="col-sm-4"><input class="form-control" type="text" name="name" placeholder="Name"></div>
		<div class="col-sm-4"><input class="form-control" type="text" name="email" placeholder="Email"></div>
		<div class="col-sm-4"><input class="form-control" type="text" name="password" placeholder="Password"></div>
	  </div>
	  <br>
	   <div class="row">
	    <div class="col-sm-4"><input class="form-control" type="text" name="phone" placeholder="Mobile"></div>
		<div class="col-sm-4"><input class="form-control" type="file" name="photo" placeholder=""></div>
		<div class="col-sm-4"><input class="form-control" type="text" name="facebook" placeholder="Facebook"></div>
	  </div>
	  <br>
	   <div class="row">
	    <div class="col-sm-4"><input class="form-control" type="text" name="twitter" placeholder="Twiter"></div>
		<div class="col-sm-4"><input class="form-control" type="text" name="linkedin" placeholder="Linkedin"></div>
		<div class="col-sm-4"><input class="form-control" type="text" name="instagram" placeholder="Instagram"></div>
	  </div>
	  <br>
	  <div class="row">
	    <div><textarea class="form-control" name="about" rows="10" cols="20"></textarea></div>
		<br>
	    <div><input type="submit" name="addAdmin" value="Add New Admin" class="form-control btn btn-primary"></div>
	  </div>
  </form>
</div>
</div>
<?php
if(isset($_POST['addAdmin']))
{
	$name=mysqli_real_escape_string($connection,$_POST['name']);
	$email=mysqli_real_escape_string($connection,$_POST['email']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$phone=mysqli_real_escape_string($connection,$_POST['phone']);
	$photo=mysqli_real_escape_string($connection,file_get_contents($_FILES['photo']['tmp_name']));
	$facebook=mysqli_real_escape_string($connection,$_POST['facebook']);
	$twitter=mysqli_real_escape_string($connection,$_POST['twitter']);
	$linkedin=mysqli_real_escape_string($connection,$_POST['linkedin']);
	$instagram=mysqli_real_escape_string($connection,$_POST['instagram']);
	$about=mysqli_real_escape_string($connection,$_POST['about']);
	
	//check empty field
	if(empty($name) and empty($email) and empty($password) and empty($phone) and empty($photo))
	{
		echo "<script>alert('Please filled all the required fields.')</script>";
		echo "<script>window.open('setting.php','_self')</script>";
	}
	else
	{
			//Insert
			$sql="insert into admin (name,email,password,phone,photo,about,facebook,linkedin,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ssssssssss',$name,$email,$password,$phone,$photo,$about,$facebook,$linkedin,$twitter,$instagram);
			$stmt->execute();
			if($stmt)
			{
				echo "<script>alert('New Admin Created.')</script>";
				echo "<script>window.open('setting.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Unable to create admin.')</script>";
				echo "<script>window.open('setting.php','_self')</script>";
			}
	}
}
?>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
   <?php
   include('includes/slidermenu.php');
   ?>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<script>
function redirect(uid,orderId)
{
	window.location = "orderdetail.php?customerUniqueId="+uid+"&orderId="+orderId;
}
</script>
<!-- mother grid end here-->
</body>
</html>             
<?php } ?>        