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
		
<!--Notification Section-->
<div class="inner-block">

<!--Wishlist Notification-->
<span><b>Wishlist Notification</b></span><br><br>
<div class="row" id="notification-container-wishlist">
  <table class="table table-bordered">
     <tr>
	   <th>Product Name</th>
	   <th class="text-center">Category</th>
	   <th class="text-center">Added By</th>
	   <th class="text-center">Phone</th>
	 </tr>
	 <?php
	  $fetchWishlist=$fetchObject->fetchTableAccordingToDate('wishlist',$connection);
	  while($getW=mysqli_fetch_array($fetchWishlist)){
		    $product=$getW['product'];
			$customer=$getW['uid'];
			$view=$getW['view'];
			
			//Now fetch Actual Product table according to wishlist's product 
			$select = "select * from product where id='$product'";
			$run = mysqli_query($connection,$select);
			$getProduct = mysqli_fetch_array($run);
			$productName=$getProduct['product_name'];
			$productCategory=$getProduct['product_category'];
			
			//Now fetch Actual Customer Table according to Wishlist's customer i.e uid
			$selectCustomer="select * from customer where mobile='$customer'";
			$_run=mysqli_query($connection,$selectCustomer);
			$getCustomer=mysqli_fetch_array($_run);
			$customerFName=$getCustomer['firstname'];
			$customerLName=$getCustomer['lastname'];
	        if($view=="no"){
	 ?>
	 <tr onclick="seenW(<?=$customer?>)">
	   <td><?=$productName?></td>
	   <td align="center">
	   <?php
	   if($productCategory==1){echo "Men";}
	   else if($productCategory==2){echo "Women";}
	   ?>
	   </td>
	   <td align="center"><?=$customerFName." ".$customerLName?></td>
	   <td style="cursor:pointer;" align="center" onclick="window.open('tel:+<?=$customer?>')"><b><?=$customer?></b></td>
	 </tr>
	  <?php } }?>
  </table>
</div>
<br><br>
<span><b>Placed Order Notification</b></span><br><br>
<div class="row" id="notification-container-soldout">
   <table class="table table-bordered">
     <tr>
	   <th>Product Name</th>
	   <th class="text-center">Category</th>
	   <th class="text-center">Placed By</th>
	   <th class="text-center">Phone</th>
	 </tr>
	 <?php
	     $fetchSoldout=$fetchObject->fetchTableAccordingToDate('soldout',$connection);
		  while($getW=mysqli_fetch_array($fetchSoldout)){
		    $product=$getW['product'];
			$customer=$getW['uid'];
			$view=$getW['view'];
			
			//Now fetch Actual Product table according to wishlist's product 
			$select = "select * from product where id='$product'";
			$run = mysqli_query($connection,$select);
			$getProduct = mysqli_fetch_array($run);
			$productName=$getProduct['product_name'];
			$productCategory=$getProduct['product_category'];
			
			//Now fetch Actual Customer Table according to Wishlist's customer i.e uid
			$selectCustomer="select * from customer where mobile='$customer'";
			$_run=mysqli_query($connection,$selectCustomer);
			$getCustomer=mysqli_fetch_array($_run);
			$customerFName=$getCustomer['firstname'];
			$customerLName=$getCustomer['lastname'];
		 
	 ?>
	 <tr onclick="seenPlaced(<?=$customer?>)">
	 <td align="center"><?=$productName?></td>
	 <td align="center">
	   <?php
	    if($productCategory==1){echo "Men";}
		else if($productCategory==2){echo "Women";}
	   ?>
	 </td>
	 <td align="center"><?=$customerFName." ".$customerLName?></td>
	 <td style="cursor:pointer;" align="center" onclick="window.open('tel:+<?=$customer?>')"><b><?=$customer?></b></td>
	 </tr>
	 <?php } ?>
	 </table>
</div>

</div>
<script>
function seenW(customer)
{
	  $.ajax({
		url:"includes/updateNotification.php",
		type:"POST",
		data:{"view":"yes","table":"wishlist","uid":customer},
		success:function(res)
		{
			if(res == "updated")
			{
				$("#notification-container-wishlist").load("notification.php #notification-container-wishlist");
			}
		}
	});
}
function seenPlaced(customer)
{
	 $.ajax({
		url:"includes/updateNotification.php",
		type:"POST",
		data:{"view":"yes","table":"soldout","uid":customer},
		success:function(res)
		{
			if(res == "updated")
			{
				$("#notification-container-soldout").load("notification.php #notification-container-soldout");
			}
		}
	});
}
</script>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     
<?php }?>