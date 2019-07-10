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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
<?php
$getTable = $fetchObject->fetchTableByAttr('admin','email',$_SESSION['email'],$connection);
                              
$retrieveAdmin = mysqli_fetch_array($getTable);
$name=$retrieveAdmin['name'];
$email=$retrieveAdmin['email'];
$description=$retrieveAdmin['about'];
$photo=$retrieveAdmin['photo'];		
$phone=$retrieveAdmin['phone'];
$fbLink=$retrieveAdmin['facebook'];
$tLink=$retrieveAdmin['twitter'];
$lLink=$retrieveAdmin['linkedin'];
$iLink=$retrieveAdmin['instagram'];			  
?>
<div class="inner-block">
<!--Admin Profile Section-->
<div class="row">
   <div class="col-sm-9">
       <span><strong><?=$name?></strong></span><br>
	   <span style="font-size:12px;"><?=$email?></span>
	   <br>
	   <p style="text-align:justify;"><?=$description?></p>
   </div>
   <div class="col-sm-2">
   <?='<img src="data:image/jpeg;base64,'.base64_encode($photo).'" class="img-thumbnail" width="200" height="200">'?><br><br>
    <form  method="POST" enctype="multipart/form-data">
		 <input type="file" class="form-control custom-input" name="updatedImg"><br>
		 <input type="submit" value="update" name="done" class="btn btn-primary"><br><br>
	</form>
   <i class="fas fa-phone-volume"></i>&nbsp;<?=$phone?><br><br>
   <i class="fab fa-facebook-f"></i>&nbsp;<a href="<?=$fbLink?>">Facebook</a><br><br>
   <i class="fab fa-twitter"></i>&nbsp;<a href="<?=$tLink?>">Twitter</a><br><br>
    <i class="fab fa-instagram"></i>&nbsp;<a href="<?=$iLink?>">Instagram</a><br><br>
   <i class="fab fa-linkedin-in"></i>&nbsp;<a href="<?=$lLink?>">Linkedin</a><br><br>
   </div>
</div>
<!--Section-->
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
<!-- mother grid end here-->
</body>
</html>  
<?php } ?>      
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$imageToUpdate = mysqli_real_escape_string($connection,file_get_contents($_FILES['updatedImg']['tmp_name']));
$getUpdateFun = $updateObject->updateData('admin','photo',$imageToUpdate,'email',$_SESSION['email'],$connection);

if($getUpdateFun)
{
	echo "<script>alert('Profile Photo Updated.')</script>";
	//echo "<script>window.open('admin_profile.php','_self')</script>";
}
else
{
	echo "<script>alert('Something Goes Wrong')</script>";
	echo "<script>window.open('admin_profile.php','_self')</script>";
}
}
?>
             