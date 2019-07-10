<!DOCTYPE HTML>
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
	
	<link rel="stylesheet" href="css/mycss.css">
	
	
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
<center><h4><strong>UPLOAD PRODUCT</strong></h4></center>
<br><br>
<form action="" method="POST" enctype="multipart/form-data">
 <table class="table table-bordered">
    <tr>
	   <td><input type="text" name="product_name" class="form-control my-input" placeholder="PRODUCT NAME" /></td>
	   <td>
	        <select name="product_category" class="form-control my-select">
			<option>CATEGORY</option>
			<?php
			 
			 $fetchtable = $fetchObject->fetchTable('category',$connection);
			 while($data = mysqli_fetch_array($fetchtable))
			 {
				   $id = $data['id'];
				   $category = $data['category'];
			 
			?>
			   <option value="<?php echo $id ;?>"><?php echo $category;?></option>
			 <?php }?>
			</select>
	   </td>
	</tr>
	<tr>
	   <td>
	      <select name="product_option" class="form-control my-select">
		      <option>OPTION</option>
			  <?php
			 $fetchtable = $fetchObject->fetchTable('catoption',$connection);
			 while($data = mysqli_fetch_array($fetchtable))
			 {
				   $id = $data['id'];
				   $catoption = $data['catoption'];
			 ?>
			 <option value="<?php echo $id ;?>"><?php echo $catoption;?></option>
			 <?php } ?>
		  </select>
	   </td>
	   <td>
	   <select name="product_suboption" class="form-control my-select">
		      <option>SUB-OPTION</option>
			  <?php
			 $fetchtable = $fetchObject->fetchTable('suboption',$connection);
			 while($data = mysqli_fetch_array($fetchtable))
			 {
				   $id = $data['id'];
				   $suboption = $data['suboption'];
			 ?>
			 <option value="<?php echo $id ;?>"><?php echo $suboption;?></option>
			 <?php } ?>
		  </select>
	   </td>
	</tr>
	<tr>
	   <td>
	     <select name="product_design" class="form-control my-select">
		      <option>DESIGN</option>
			  <?php
			 $fetchtable = $fetchObject->fetchTable('design',$connection);
			 while($data = mysqli_fetch_array($fetchtable))
			 {
				   $id = $data['id'];
				   $design = $data['design'];
			 ?>
			 <option value="<?php echo $id ;?>"><?php echo $design;?></option>
			 <?php } ?>
		</select>
	   </td>
	   <td><input type="text" name="product_price" class="form-control my-input" placeholder="PRODUCT PRICE"></td>
	</tr>
	<tr>
	   <td><textarea rows="10" cols="30" name="product_desc" class="form-control my-input" placeholder="PRODUCT DESCRIPTION"></textarea></td>
	   <td><input type="text" name="product_color" class="form-control my-input" placeholder="PRODUCT COLOR"></td>
	</tr>
	<tr>
	   <td>
	       <select name="product_fit" class="form-control">
		      <option>Select Fit</option>
		      <option value="Regular">Regular</option>
			  <option value="Slim">Slim</option>
		   </select>
	   </td>
	   <td>
	      <select name="product_sleeves" class="form-control">
		     <option>Sleeves</option>
		     <option value="Full Sleeve">Full Sleeve</option>
			 <option value="Half Sleeve">Half Sleeve</option>
		  </select>
	   </td>
	</tr>
	<tr>
	<td>
	    <select name="product_neck" class="form-control">
		   <option>Neck</option>
		   <option value="Round Neck">Round Neck</option>
		   <option value="Hood">Hood</option>
		   <option value="Two Piece Collar">Two Piece Collar</option>
		   <option value="Mandarin Collar">Mandarin Collar</option>
		</select>
	</td>
	</tr>
	<tr>
	   <td><input type="file" name="product_image" class="form-control my-input"></td>
	   <td><input type="submit" value="UPLOAD" name="upload" class="btn btn-primary my-btn"></td>
	</tr>
 </table>
</form>

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
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
	  $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
	  $product_category = mysqli_real_escape_string($connection,$_POST['product_category']);
	  $product_option = mysqli_real_escape_string($connection,$_POST['product_option']);
	  $product_suboption = mysqli_real_escape_string($connection,$_POST['product_suboption']);
	  $product_design = mysqli_real_escape_string($connection,$_POST['product_design']);
	  $product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
	  $product_desc = mysqli_real_escape_string($connection,$_POST['product_desc']);
	  $product_color = mysqli_real_escape_string($connection,$_POST['product_color']);
	  $product_fit = mysqli_real_escape_string($connection,$_POST['product_fit']);
	  $product_sleeves = mysqli_real_escape_string($connection,$_POST['product_sleeves']);
	  $product_neck = mysqli_real_escape_string($connection,$_POST['product_neck']);
	  $product_image = mysqli_real_escape_string($connection,file_get_contents($_FILES['product_image']['tmp_name']));
	  
	  $insert = "insert into product(product_name,product_category,product_option,product_suboption,product_design,product_price,product_desc,product_color,product_fit,product_sleeves,product_neck,product_image) values ('$product_name','$product_category','$product_option','$product_suboption','$product_design','$product_price','$product_desc','$product_color','$product_fit','$product_sleeves','$product_neck','$product_image')";
	  $init = mysqli_query($connection,$insert);
	  if($init)
	  {
		  echo "<script>window.open('product_upload.php','_self')</script>";
	  }
	  else
	  {
		   echo "<script>alert('Something goes wrong!')</script>";
	  }
  }	  
?>


