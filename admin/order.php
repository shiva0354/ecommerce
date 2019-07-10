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
		<center><h1>ORDER</h1></center>
<!--inner block start here-->

<div class="inner-block">

<table class="table table-bordered">
<tr>
  <th class="text-center">Order No</th>
  <th class="text-center">Purchased On</th>
  <th class="text-center">Customer Name</th>
  <th class="text-center">Ship To</th>
  <th class="text-center">Payment</th>
  <th class="text-center">Fullfillment Status</th>
  <th class="text-center">Total Amount</th>
  <th class="text-center">Detail</th>
</tr>
<!--Order Retirieving Code-->
<?php
 //This Query Join two table//$select ="select address.receiver_name,soldout.orderid,soldout.date,soldout.payment,soldout.price from soldout INNER JOIN address ON soldout.uid=address.uid";
 $select="select address.receiver_name,soldout.orderid,soldout.date,soldout.payment,sum(soldout.price),soldout.qty,customer.firstname,customer.mobile from
 ((soldout INNER JOIN address ON soldout.uid=address.uid)
 INNER JOIN customer ON soldout.uid=customer.mobile)";
$run=mysqli_query($connection,$select);
$arr=array();
while($row=mysqli_fetch_array($run))
{
	$receiverName=$row['receiver_name'];
	$orderId=$row['orderid'];
	$date=$row['date'];
	$payment=$row['payment'];
	$price=$row['sum(soldout.price)'];
	$qty=$row['qty'];
	$customerName=$row['firstname'];
	$mobile=$row['mobile'];
	
?>
<tr>
<td align="center"><?=$orderId?></td>
<td align="center"><?=$date?></td>
<td align="center"><?=$customerName?></td>
<td align="center"><?=$receiverName?></td>
<td align="center"><?=$payment?></td>
<td align="center"><button>pending</button></td>
<td align="center"><?=$price?></td>
<td align="center"><button class="btn btn-primary" onclick="redirect('<?=$mobile?>','<?=$orderId?>')">Details</button></td>
</tr>
<?php } ?> 
</table>

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